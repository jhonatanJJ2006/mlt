<?php

namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class ArticulosController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 3;
        $total = Articulo::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        
        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/articulos?page=1');
        }
        
        $articulos = Articulo::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/articulos/index', [
            'titulo' => 'Articulos',
            'articulos' => $articulos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {

        $alertas = [];
        $articulo = new Articulo;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/articulos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;

            } 

            $articulo->sincronizar($_POST);

            // Validar
            $alertas = $articulo->validar();


            // Guardar el registro
            if(empty($alertas)) {
                
                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");

                // Guardar en la base de datos
                $resultado = $articulo->guardar();

                if($resultado) {
                    header('Location: /admin/articulos');
                }
            }
        }

        $router->render('admin/articulos/crear', [
            'titulo' => 'Crear Articulo',
            'articulo' => $articulo,
            'alertas' => $alertas
        ]);
    }

    public static function editar(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/articulos');
        }

        $articulo = Articulo::find($id);

        if(!$articulo) {
            header('Location: /admin/articulos');
        }

        $articulo->imagen_Actual = $articulo->imagen;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Leer Imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/articulos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }
                
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png',80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp',80);
                
                $nombre_imagen = md5(uniqid(rand(), true));
                
                $_POST['imagen'] = $nombre_imagen;
                
                unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $articulo->imagen . '.png');
                unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $articulo->imagen . '.webp');

            } else {
                $_POST['imagen'] = $articulo->imagen_actual;
            }

            $articulo->sincronizar($_POST);

            $alertas = $articulo->validar();

            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png");
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp");    
                }

                $resultado = $articulo->guardar();

                if($resultado) {
                    header('location: /admin/articulos');
                }
            }
        }

        $router->render('admin/articulos/editar', [
            'titulo' => 'Editar Articulo',
            'articulo' => $articulo,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $carpeta_imagenes = '../public/build/img/articulos';
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);            

            if(!$id) {
                header('Location: /admin/articulos');
            }

            $articulo = Articulo::find($id);

            if(isset($articulo)) {
                header('Location: /admin/articulos');
            }

            $resultado = $articulo->eliminar();

            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $articulo->imagen . '.png');
            unlink(__DIR__ . '/' . $carpeta_imagenes . '/' . $articulo->imagen . '.webp');

            if($resultado) {
                header('Location: /admin/articulos');
            }
        }
    }
}