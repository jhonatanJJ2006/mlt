<?php

namespace Controllers;

use MVC\Router;
use Model\Revista;
use Intervention\Image\ImageManagerStatic as Image;
use Classes\Paginacion;
use Spatie\PdfToImage\Pdf;

class RevistaController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 3;
        $total = Revista::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/revista?page=1');
        }
        
        $revistas = Revista::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/revista/index', [
            'titulo' => 'Revistas',
            'revistas' => $revistas,
            'paginacion' => $paginacion->paginacion()
        ]);
    }
    
    public static function crear(Router $router) {

        $alertas = [];
        $revista = new Revista;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Leer pdf
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_revistas_img = '../public/build/revistas/img';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_revistas_img)) {
                    mkdir($carpeta_revistas_img, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;
            }

            if(!empty($_FILES['pdf']['tmp_name'])) {
                $carpeta_revistas = '../public/build/revistas/pdf';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_revistas)) {
                    mkdir($carpeta_revistas, 0755, true);
                }

                $revista_pdf = $_FILES['pdf']['tmp_name'];

                $nombre_pdf = md5(uniqid(rand(), true));     
                
                $_POST['pdf'] = $nombre_pdf;
            }

            $revista->sincronizar($_POST);

            // Validar
            $alertas = $revista->validar();

            // Guardar el registro
            if(empty($alertas)) {
                
                // Guardar las imagenes
                $imagen_png->save($carpeta_revistas_img . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_revistas_img . '/' . $nombre_imagen . ".webp");
                
                // Guardar los revistas
                move_uploaded_file($revista_pdf, $carpeta_revistas . '/' . $nombre_pdf . '.pdf');
                
                // Guardar en la base de datos
                $resultado = $revista->guardar();

                if($resultado) {
                    header('Location: /admin/revista');
                }
            }
        }

        $router->render('admin/revista/crear', [
            'titulo' => 'Nuev Revista',
            'alertas' => $alertas,
            'youtube' => true
        ]);
    }

    public static function editar(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        $alertas = [];

        if(!$id) {
            header('Location: /admin/revista');
        }

        $revista = Revista::find($id);

        if(!$revista) {
            header('Location: /admin/revista');
        }

        $revista->imagen_Actual = $revista->imagen;
        $revista->pdf_Actual = $revista->pdf;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer Imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/revistas/img';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }
                
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;
                
                unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $revista->imagen . '.png');
                unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $revista->imagen . '.webp');

            } else {
                $_POST['imagen'] = $revista->imagen_Actual;
            }

            // Leer PDF
            if(!empty($_FILES['pdf']['tmp_name'])) {
                $carpeta_imagenes_pdf = '../public/build/revistas/pdf';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes_pdf)) {
                    mkdir($carpeta_imagenes_pdf, 0755, true);
                }
                
                $revista_pdf = $_FILES['pdf']['tmp_name'];
                $nombre_pdf = md5(uniqid(rand(), true));
                
                $_POST['pdf'] = $nombre_pdf;
                
                unlink(__DIR__ . '/' . $carpeta_imagenes_pdf . '/' . $revista->pdf . '.pdf');

            } else {
                $_POST['pdf'] = $revista->pdf_Actual_actual;
            }


            $revista->sincronizar($_POST);

            $alertas = $revista->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");    
                }

                if(isset($_FILES['pdf']['tmp_name'])) {
                    // Guardar los revistas
                    move_uploaded_file($revista_pdf, $carpeta_imagenes_pdf . '/' . $nombre_pdf . '.pdf');
                }

                $resultado = $revista->guardar();

                if($resultado) {
                    header('location: /admin/revista');
                }
            }
        }

        $router->render('admin/revista/editar', [
            'titulo' => 'Actualizar Revista',
            'revista' => $revista,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $carpeta_imagenes = '../public/build/revistas/img';
            $carpeta_imagenes_pdf = '../public/build/revistas/pdf';

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);            

            if(!$id) {
                header('Location: /admin/revista');
            }

            $revista = Revista::find($id);

            if(isset($revista)) {
                header('Location: /admin/revista');
            }

            $resultado = $revista->eliminar();

            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $revista->imagen . '.png');
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $revista->imagen . '.webp');
            unlink(__DIR__ . '/' . $carpeta_imagenes_pdf . '/' . $revista->pdf . '.pdf');

            if($resultado) {
                header('Location: /admin/revista');
            }
        }
    }
}