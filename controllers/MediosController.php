<?php

namespace Controllers;

use MVC\Router;
use Model\Medio;
use Classes\Paginacion;

class MediosController {

    public static function index(Router $router) {

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);
        
        $registros_por_pagina = 3;
        $total = Medio::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('location: /admin/medios?page=1');
        }
        
        $medios = Medio::paginar($registros_por_pagina, $paginacion->offset());

        $router->render('admin/medios/index', [
            'titulo' => 'Medios',
            'medios' => $medios,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {

        $alertas = [];
        $medio = new Medio;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $url = $_POST['url'];

            $nueva_url = str_replace("https://www.youtube.com/watch?v=", "", $url);
            $nueva_url = trim($nueva_url);
            $nueva_url = substr($nueva_url, 0, 11);

            $_POST['url'] = $nueva_url;

            $medio->sincronizar($_POST);

            $alertas = $medio->validar();

            if(empty($alertas)) {

                $resultado = $medio->guardar();

                if($resultado) {
                    header('Location: /admin/medios');
                }
            }

        }

        $router->render('admin/medios/crear', [
            'titulo' => 'Nuevo Video',
            'alertas' => $alertas,
            'youtube' => true
        ]);
    }

    public static function crear_video(Router $router) {

        $alertas = [];
        $video = new Medio;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer video
            if(!empty($_FILES['video']['tmp_name'])) {
                $carpeta_videos = '../public/build/videos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_videos)) {
                    mkdir($carpeta_videos, 0755, true);
                }

                $video_mp4 = $_FILES['video']['tmp_name'];

                $nombre_video = md5(uniqid(rand(), true));     
                
                $_POST['url'] = $nombre_video;
            }

            $video->sincronizar($_POST);

            // Validar
            $alertas = $video->validar();

            // Guardar el registro
            if(empty($alertas)) {
                
                // Guardar los videos
                move_uploaded_file($video_mp4, $carpeta_videos . '/' . $nombre_video . '.mp4');
                
                // Guardar en la base de datos
                $resultado = $video->guardar();

                if($resultado) {
                    header('Location: /admin/medios');
                }
            }
        }

        $router->render('admin/medios/crear-video', [
            'titulo' => 'Nuevo Video',
            'alertas' => $alertas,
            'youtube' => false
        ]);
    }

    public static function editar(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/medios');
        }

        $medio = Medio::find($id);

        if(!$medio) {
            header('Location: /admin/medios');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $url = $_POST['url'];

            $nueva_url = str_replace("https://www.youtube.com/watch?v=", "", $url);
            $nueva_url = trim($nueva_url);
            $nueva_url = substr($nueva_url, 0, 11);

            $_POST['url'] = $nueva_url;
            
            $medio->sincronizar($_POST);

            $alertas = $medio->validar();

            if(empty($alertas)) {

                $resultado = $medio->guardar();

                if($resultado) {
                    header('location: /admin/medios');
                }
            }
        }

        $router->render('admin/medios/editar', [
            'titulo' => 'Editar URL Video',
            'medio' => $medio,
            'youtube' => true
        ]);
    }

    public static function editar_video(Router $router) {

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/medios');
        }

        $medio = Medio::find($id);

        if(!$medio) {
            header('Location: /admin/medios');
        }

        $medio->video_Actual = $medio->url;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Leer video
            if(!empty($_FILES['video']['tmp_name'])) {
                $carpeta_videos = '../public/build/videos';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_videos)) {
                    mkdir($carpeta_videos, 0755, true);
                }

                $video_mp4 = $_FILES['video']['tmp_name'];

                $nombre_video = md5(uniqid(rand(), true));     
                
                $_POST['url'] = $nombre_video;

                unlink(__DIR__ . '/' . $carpeta_videos . '/' . $medio->url . '.mp4');

            } else {
                $_POST['url'] = $medio->video_Actual;
            }

            $medio->sincronizar($_POST);

            // Validar
            $alertas = $medio->validar();


            // Guardar el registro
            if(empty($alertas)) {
                
                // Guardar los videos
                move_uploaded_file($video_mp4, $carpeta_videos . '/' . $nombre_video . '.mp4');
                
                // Guardar en la base de datos
                $resultado = $medio->guardar();

                if($resultado) {
                    header('Location: /admin/medios');
                }
            }
        }

        $router->render('admin/medios/editar', [
            'titulo' => 'Editar Video',
            'medio' => $medio,
            'youtube' => false
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);            

            if(!$id) {
                header('Location: /admin/medios');
            }

            $medio = Medio::find($id);

            if(isset($medio)) {
                header('Location: /admin/medios');
            }

            $resultado = $medio->eliminar();

            if($resultado) {
                header('Location: /admin/medios');
            }
        }
    }

}
