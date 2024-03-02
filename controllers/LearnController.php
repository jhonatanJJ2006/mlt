<?php

namespace Controllers;

use Model\Descarga;
use MVC\Router;
use Model\Curso;
use Model\Alerta;
use Model\Compra;
use Model\Eventos;
use Model\Ponente;
use Model\Usuario;
use Model\Documento;

class LearnController {

    public static function index(Router $router) {

        session_start();

        $id = $_SESSION['id'];
        
        $compras = Compra::whereDoble('usuario_id', $id, 'confirmado', '1');

        foreach($compras as $compra) {
            $cursos[] = reset(Curso::where('id', $compra->curso_id));
        }

        $router->render('cursos/index', [
            'titulo' => 'Mis Cursos',
            'cursos' => $cursos
        ]);
    }

    public static function dashboard(Router $router) {

        session_start();

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: cursos/learn');
        }


        $curso = Curso::find($id);

        $ponente = Ponente::find($curso->ponente_id);

        $compra = Compra::whereDoble('curso_id', $curso->id, 'usuario_id', $_SESSION['id']);
        $compra = reset($compra);


        if($_SESSION['id'] !== $compra->usuario_id) {
            debuguear('hola');
            header('Location: /cursos/learn');
        }


        if($compra->confirmado == 1) {
            $alertas = Alerta::where('curso_id', $compra->curso_id);
            $documentos = Documento::where('curso_id', $compra->curso_id);
            $eventos = Eventos::where('curso_id', $compra->curso_id);
            $descargas = Descarga::where('usuario_id', $compra->usuario_id);

            if($documentos) {
                $progreso = (count($descargas) / count($documentos)) * 100;
                $progreso = number_format($progreso, 2);
            } else {
                $progreso = 0;
            }

        } else {
            header('Location: /cursos');
        }
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $descarga = new Descarga;

            $_POST['usuario_id'] = $_SESSION['id'];
            $_POST['documento_id'] = $_POST['documento'];

            $descarga->sincronizar($_POST);

            $documento = Documento::find($descarga->documento_id);

            $documento_extencion = pathinfo($documento->nombre, PATHINFO_EXTENSION);

            $documento_carpeta = '../public/build/docs/';

            // Configurar las cabeceras para indicar que se va a descargar un archivo
            if($documento_extencion === 'jpg' || $documento_extencion === 'png') {

                $existe_descarga = Descarga::whereDoble('usuario_id', $descarga->usuario_id, 'documento_id', $descarga->documento_id);

                if(!$existe_descarga) {
                    $descarga->descargado = 1;
                    $descarga->guardar();
                }

                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $documento->archivo . '.png"');
                readfile($documento_carpeta . $documento->archivo . ".png");

            } else if($documento_extencion === 'pptx') {

                $existe_descarga = Descarga::whereDoble('usuario_id', $descarga->usuario_id, 'documento_id', $descarga->documento_id);

                if(!$existe_descarga) {
                    $descarga->descargado = 1;
                    $descarga->guardar();
                }

                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $documento->archivo . '.pptx"');
                readfile($documento_carpeta . $documento->archivo . ".". $documento_extencion);

            } else {

                $existe_descarga = Descarga::whereDoble('usuario_id', $descarga->usuario_id, 'documento_id', $descarga->documento_id);

                if(!$existe_descarga) {
                    $descarga->descargado = 1;
                    $descarga->guardar();
                }

                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $documento->archivo . '.pdf"');
                readfile($documento_carpeta . $documento->archivo . ".". $documento_extencion);
            }            
        }



        $router->render('cursos/dashboard', [
            'titulo' => $curso->nombre,
            'curso' => $curso,
            'ponente' => $ponente,
            'alertas' => $alertas,
            'documentos' => $documentos,
            'eventos' => $eventos,
            'descargas' => $descargas,
            'progreso' => $progreso
        ]);
    }
}