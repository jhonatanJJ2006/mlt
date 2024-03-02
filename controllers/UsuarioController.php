<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class UsuarioController {

    public static function index(Router $router) {

        $usuarios = Usuario::all();

        $router->render('admin/usuarios/index',[
            'titulo' => 'Administracion de Usuarios',
            'usuarios' => $usuarios
        ]);
    }

    public static function admin() {

        // Verificar si es administrador ......

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/usuarios');
        }

        $usuario = Usuario::find($id);

        if(!$usuario) {
            header('Location: /admin/usuarios');
        }

        $usuario->admin = 1;

        $usuario->sincronizar($_POST);

        $resultado = $usuario->guardar();

        if($resultado) {
            header('Location: /admin/usuarios');
        }
    }

    public static function admin_logout() {
        
        // Verificar si es administrador ......

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/usuarios');
        }

        $usuario = Usuario::find($id);

        if(!$usuario) {
            header('Location: /admin/usuarios');
        }

        $usuario->admin = 0;

        $usuario->sincronizar($_POST);

        $resultado = $usuario->guardar();

        if($resultado) {
            header('Location: /admin/usuarios');
        }
    }

    public static function eliminar() {
        
        // Verificar si es administrador ......

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if(!$id) {
                header('Location: /admin/usuarios');
            }
    
            $usuario = Usuario::find($id);
    
            if(!$usuario) {
                header('Location: /admin/usuarios');
            }
    
            $usuario->sincronizar($_POST);
    
            $resultado = $usuario->eliminar();
    
            if($resultado) {
                header('Location: /admin/usuarios');
            }
        }

    }
}