<?php

namespace Controllers;

use Classes\EmailContacto;
use MVC\Router;
use Model\Curso;
use Model\Medio;
use Model\Compra;
use Model\Ponente;
use Model\Usuario;
use Model\Articulo;
use Classes\Paginacion;
use Model\Revista;

class DashboardController {
    public static function index(Router $router) {
        session_start();

        $id = $_SESSION['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            $usuario = Usuario::find($id);
            $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');
        }

        $cursos = Curso::get(6);

        $router->render('/dashboard/index', [
            'usuario' => $usuario,
            'cursos' => $cursos,
            'compras' => $compras
        ]);
    }

    public static function cursos(Router $router) {
        
        session_start();

        $id = $_SESSION['id'];

        if($id) {
            $usuario = Usuario::find($id);
            $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');
        }

        $cursos = Curso::all();

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        $registros_por_pagina = 3;
        $total = Ponente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /cursos?page=1');
        }
        
        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(is_auth()) { 

                $compra = new Compra;

                $_POST['usuario_id'] = $_SESSION['id'];

                $compra->sincronizar($_POST);

                $resultado = $compra->guardar();

                if($resultado) {
                    header('Location: /cursos');
                }

            } else {
                header('Location: /auth/login?alerta=carrito');
            }
        }


        $router->render('/dashboard/cursos/index', [
            'titulo' => 'Nuestros Cursos',
            'cursos' => $cursos,
            'ponentes' => $ponentes,
            'alertas' => $alertas,
            'compras' => $compras,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function carrito(Router $router) { 

        session_start();

        $id = $_SESSION['id'];

        $usuario = Usuario::find($id);
        $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');

        $router->render('/dashboard/carrito/index', [
            'titulo' => 'Carrito de Compras',
            'compras' => $compras,
            'usuario' => $usuario
        ]);
    }

    public static function carritoConfirmar() {
        // Verificar la sesión y obtener el usuario
        session_start();
        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);
    
        // Actualizar las compras del usuario
        $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');
        foreach ($compras as $compra) {
            $compra->confirmado = 1;
            $compra->guardar();
        }
    
        // Enviar una respuesta de éxito
        http_response_code(200);
        echo json_encode(['message' => 'Compras actualizadas correctamente']);
    }   


    public static function carrito_eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['curso_id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if(!$id) {
                header('Location: /carrito');
            }
            
            $compra = Compra::where('curso_id', $id);

            $compra = reset($compra);

            $resultado = $compra->eliminar();

            if($resultado) {
                header('Location: /carrito');
            }

        }

    }

    public static function quienes_somos(Router $router) {
        session_start();
        $id = $_SESSION['id'];

        if($id) {
            $usuario = Usuario::find($id);
            $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');
        }


        $router->render('/dashboard/quienes-somos/index', [
            'titulo' => 'Quienes somos - Milicia de la Inmaculada',
            'compras' => $compras
        ]);
    }

    public static function medios(Router $router) {

        session_start();

        $id = $_SESSION['id'];

        if($id) {
            $usuario = Usuario::find($id);
            $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');
        }

        $medios = Medio::all();
        $articulos = Articulo::all();     

        $router->render('/dashboard/medios/index', [
            'titulo' => 'Medios San Miguel',
            'medios' => $medios,
            'articulos' => $articulos, 
            'compras' => $compras
        ]);
    }

    public static function medios_articulo(Router $router) {

        session_start();

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);            

        if(!$id) {
            header('Location: /medios');
        }
        
        $articulo_id = Articulo::find($id);
        
        if(!$articulo_id) {
            header('Location: /medios');
        }

        $articulos = Articulo::diferent($id);

        $id_session = $_SESSION['id'];
        if($id_session) {
            $usuario = Usuario::find($id_session);
            $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');
        }

        $router->render('/dashboard/medios/articulo', [
            'titulo' => 'Medios San Miguel',
            'articulo_id' => $articulo_id,
            'articulos' => $articulos,
            'compras' => $compras
        ]);
    }

    public static function ponente(Router $router) {

        session_start();

        $usuario = Usuario::find($_SESSION['id']);

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /cursos');
        }

        $ponente = Ponente::find($id);

        $tags = explode(",", $ponente->tags);
        $redes = json_decode($ponente->redes);
        $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');

        $router->render('dashboard/ponente/index', [
            'titulo' => 'Información Ponente',
            'ponente' => $ponente,
            'tags' => $tags,
            'redes' => $redes,
            'compras' => $compras
        ]);
    }

    public static function contacto(Router $router) {

        session_start();

        $usuario = Usuario::find($_SESSION['id']);

        $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Enviar email
            $email = new EmailContacto($_POST['email'], $_POST['nombre'], $_POST['mensaje']);
            $resultado = $email->enviar();

        }

        $router->render('dashboard/contacto/index', [
            'titulo' => 'Contacto',
            'compras' => $compras
        ]);
    }

    public static function revista(Router $router) {

        session_start();

        $id = $_SESSION['id'];

        if($id) {
            $usuario = Usuario::find($id);
            
            $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');

            if($usuario->suscripcion == 1) {
                $revistas = Revista::all();
            }

        }
        
        $router->render('dashboard/revista/index', [
            'titulo' => 'Revistas',
            'revistas' => $revistas,
            'compras' => $compras
        ]);
    }

    public static function activarSuscripcion(Router $router) {
        session_start();
        $id = $_SESSION['id'];
        $usuario = Usuario::find($id);
        $usuario->suscripcion = 1;
        $usuario->guardar();
        // Puedes devolver un mensaje de éxito si lo deseas
        echo json_encode(['message' => 'Suscripción activada correctamente']);
    }  



    public static function revista_doc(Router $router) {

        session_start();

        $usuario = Usuario::find($_SESSION['id']);

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /revista');
        }

        $revista = Revista::find($id);

        if(!$revista) {
            header('Location: /revista');
        }

        $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');

        $router->render('dashboard/revista/doc', [
            'titulo' => $revista->nombre,
            'revista' => $revista,
            'compras' => $compras
        ]);
    }


    public static function donaciones(Router $router) {

        
        session_start();

        $usuario = Usuario::find($_SESSION['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $monto = $_POST['monto'];
            if(!$monto) {
                Usuario::setAlerta('error', 'El Monto es Obligatorio');
            }
            if($monto < 20) {
                Usuario::setAlerta('error', 'El Monto Debe Pasas de los $20');
            }
        }

        $compras = Compra::whereDoble('usuario_id', $usuario->id, 'confirmado', '0');

        $alertas = Usuario::getAlertas();

        $router->render('dashboard/donaciones/index', [
            'titulo' => 'Donaciones',
            'alertas' => $alertas,
            'compras' => $compras
        ]);
    }


}