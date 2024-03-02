<?php

namespace Controllers;

use MVC\Router;
use Model\Curso;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Alerta;
use Model\Documento;
use Model\Eventos;
use Model\Ponente;

class CursosController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 3;
        $total = Curso::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        $ponentes = Ponente::all();

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/cursos?page=1');
        }
        
        $cursos = Curso::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/cursos/index', [
            'titulo' => 'Conferencias y Cursos',
            'cursos' => $cursos,
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {

        $alertas = [];
        $ponentes = Ponente::all();
        $curso = new Curso;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/cursos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;

            }

            $_POST['ponente_id'] = $_POST['ponente_id_crear'];

            $curso->sincronizar($_POST);

            // Validar
            $alertas = $curso->validar();


            // Guardar el registro
            if(empty($alertas)) {
                
                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la base de datos
                $resultado = $curso->guardar();

                if($resultado) {
                    header('Location: /admin/cursos');
                }
            }
        }

        $alertas = Curso::getAlertas();

        $router->render('admin/cursos/crear', [
            'titulo' => 'Registrar Curso',
            'curso' => $curso,
            'ponentes' => $ponentes,
            'alertas' => $alertas
        ]);
    }

    public static function learn(Router $router) {
        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $router->render('admin/cursos/learn/index', [
            'titulo' => $curso->nombre,
            'curso' => $curso
        ]);
    }

    public static function alertas(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $alertas = Alerta::where('curso_id', $curso->id);
        
        $router->render('admin/cursos/learn/alertas', [
            'titulo' => 'Alertas de: ' . $curso->nombre,
            'curso' => $curso,
            'alertas' => $alertas
        ]);
    }

    public static function alertas_crear(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $alerta = new Alerta;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $alerta->sincronizar($_POST);

            $alertas = $alerta->validar();

            if(empty($alertas)) {

                date_default_timezone_set('America/Guayaquil');
                $fecha_actual = date('d-m-Y');
                $hora_actual = date('H:i:s');

                $_POST['curso_id'] = $curso->id;
                $_POST['fecha'] = $fecha_actual;
                $_POST['hora'] = $hora_actual;

                $alerta->sincronizar($_POST);

                $resultado = $alerta->guardar();

                if($resultado) {
                    header('Location: /admin/cursos/learn/alerts');
                }

            } 

        }

        $router->render('admin/cursos/learn/alertas-crear', [
            'titulo' => 'Crear Nueva Alerta para: ' . $curso->nombre,
            'alerta' => $alerta,
            'alertas' => $alertas
        ]);
    }

    public static function alertas_editar(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $alerta = Alerta::find($id);

        if(!$alerta) {
            header('Location: /admin/cursos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $alerta->sincronizar($_POST);
            $alertas = $alerta->validar();

            if(empty($alertas)) {

                $reultado = $alerta->guardar();

                if($reultado) {
                    header('Location: /admin/cursos/learn/alerts');
                }
            }
        }

        $router->render('admin/cursos/learn/alertas-editar', [
            'titulo' => 'Actualizar Alerta',
            'alerta' => $alerta,
            'alertas' => $alertas
        ]);
    }

    public static function alertas_eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if(!$id) {
                header('Location: /admin/cursos');
            }
    
            $alerta = Alerta::find($id);
    
            if(!$alerta) {
                header('Location: admin/cursos');
            }
    
            $resultado = $alerta->eliminar();
    
            if($resultado) {
                header('Location: /admin/cursos/learn/alerts');
            }
        }
    }

    public static function documentos(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $documentos = Documento::where('curso_id', $curso->id);

        $router->render('admin/cursos/learn/documentos', [
            'titulo' => 'Documentos de: ' . $curso->nombre,
            'curso' => $curso,
            'documentos' => $documentos
        ]);
    }

    public static function documentos_crear(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $documento = new Documento;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer imagen
            if(!empty($_FILES['archivo']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/docs/';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }


                if($_FILES['archivo']['type'] !== 'application/pdf' && $_FILES['archivo']['type'] !== 'application/vnd.openxmlformats-officedocument.presentationml.presentation') {
                    $imagen_png = Image::make($_FILES['archivo']['tmp_name'])->fit(800, 800)->encode('png', 80);
                    $imagen_webp = Image::make($_FILES['archivo']['tmp_name'])->fit(800, 800)->encode('webp', 80);
                }
                
                $nombre_Archivo = md5(uniqid(rand(), true));
                
                $_POST['archivo'] = $nombre_Archivo;

            }

            $_POST['curso_id'] = $curso->id;
            date_default_timezone_set('America/Guayaquil');
            $fecha_actual = date('d-m-Y');
            $hora_actual = date('H:i:s');

            $_POST['curso_id'] = $curso->id;
            $_POST['fecha'] = $fecha_actual;
            $_POST['hora'] = $hora_actual;
            $_POST['nombre'] = $_FILES['archivo']['name'];

            $archivo_pdf = $_FILES['archivo']['tmp_name'];
            $archivo_pptx = $_FILES['archivo']['tmp_name'];

            $documento->sincronizar($_POST);

            // Validar
            $alertas = $documento->validar();


            // Guardar el registro
            if(empty($alertas)) {

                if($_FILES['archivo']['type'] !== 'application/pdf' && $_FILES['archivo']['type'] !== 'application/vnd.openxmlformats-officedocument.presentationml.presentation') {
                    // Guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_Archivo . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_Archivo . ".webp");

                } else if($_FILES['archivo']['type'] === 'application/pdf' ) {
                    move_uploaded_file($archivo_pdf, $carpeta_imagenes . '/' . $nombre_Archivo . '.pdf');

                } else {
                    move_uploaded_file($archivo_pptx, $carpeta_imagenes . '/' . $nombre_Archivo . '.pptx');
                }              


                // Guardar en la base de datos
                $resultado = $documento->guardar();

                if($resultado) {
                    header('Location: /admin/cursos/learn');
                }
            }
        }

        $router->render('admin/cursos/learn/documentos-crear', [
            'titulo' => 'Crear Nuevo Documento para: ' . $curso->nombre,
            'documento' => $documento,
            'alertas' => $alertas
        ]);
    }

    public static function documentos_eliminar() {

        $carpeta_imagenes = '../public/build/docs';

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/cursos/learn');
        }

        $documento = Documento::find($id);

        if(!$documento) {
            header('Location: /admin/cursos/learn');
        }

        $resultado = $documento->eliminar();

        if($resultado) {
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $documento->archivo . '.png');
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $documento->archivo . '.webp');
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $documento->archivo . '.pdf');
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $documento->archivo . '.pptx');

            header('Location: /admin/cursos/learn');
        }
    }

    public static function eventos(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $eventos = Eventos::where('curso_id', $curso->id);

        $router->render('admin/cursos/learn/eventos', [
            'titulo' => 'Eventos de: ' . $curso->nombre,
            'curso' => $curso,
            'eventos' => $eventos
        ]);
    }

    public static function eventos_crear(Router $router) {

        $id = s($_GET['id']);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $evento = new Eventos;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $_POST['curso_id'] = $curso->id;

            $evento->sincronizar($_POST);

            $fecha = date_create_from_format('Y-m-d', $_POST['fecha']);
            $fecha = $fecha->format('d-m-Y');

            $_POST['fecha'] = $fecha;

            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if(empty($alertas)) {

                $resultado = $evento->guardar();

                if($resultado) {
                    header('Location: /admin/cursos/learn');
                }
            }
        }

        $router->render('admin/cursos/learn/eventos-crear', [
            'titulo' => 'Crear Nuevo Evento para: ' . $curso->nombre,
            'evento' => $evento,
            'alertas' => $alertas
        ]);
    }

    public static function eventos_editar(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin/cursos');
        }

        $evento = Eventos::find($id);

        if(!$evento) {
            header('Location: /admin/cursos');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $evento->sincronizar($_POST);
            $alertas = $evento->validar();

            if(empty($alertas)) {

                $reultado = $evento->guardar();

                if($reultado) {
                    header('Location: /admin/cursos/learn/events');
                }
            }
        }

        $router->render('admin/cursos/learn/eventos-editar', [
            'titulo' => 'Actualizar Evento',
            'evento' => $evento,
            'alertas' => $alertas
        ]);
    }

    public static function eventos_eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if(!$id) {
                header('Location: /admin/cursos');
            }
    
            $evento = Eventos::find($id);
    
            if(!$evento) {
                header('Location: admin/cursos');
            }
    
            $resultado = $evento->eliminar();
    
            if($resultado) {
                header('Location: /admin/cursos/learn/alerts');
            }
        }
    }

    public static function editar(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $alertas = [];

        if(!$id) {
            header('Location: /admin/cursos');
        }

        $curso = Curso::find($id);

        if(!$curso) {
            header('Location: /admin/cursos');
        }

        $curso->imagen_Actual = $curso->imagen;

        $ponente = Ponente::find($curso->ponente_id);
        $ponentes = Ponente::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer Imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/cursos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }
                
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;
                
                unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $curso->imagen . '.png');
                unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $curso->imagen . '.webp');

            } else {
                $_POST['imagen'] = $curso->imagen_actual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);

            $_POST['ponente_id'] = $_POST['ponente_id_editar'];

            $curso->sincronizar($_POST);

            $alertas = $curso->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");    
                }

                $resultado = $curso->guardar();

                if($resultado) {
                    header('location: /admin/cursos');
                }
            }
        }


        $router->render('admin/cursos/editar', [
            'titulo' => 'Actualizar Curso',
            'curso' => $curso,
            'ponente' => $ponente,
            'ponentes' => $ponentes,
            'alertas' => $alertas
        ]);
    }
    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $carpeta_imagenes = '../public/build/img/cursos';
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);            

            if(!$id) {
                header('Location: /admin/cursos');
            }

            $curso = Curso::find($id);

            if(isset($curso)) {
                header('Location: /admin/cursos');
            }

            $resultado = $curso->eliminar();

            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $curso->imagen . '.png');
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $curso->imagen . '.webp');

            if($resultado) {
                header('Location: /admin/cursos');
            }
        }
    }
}