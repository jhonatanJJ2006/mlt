<?php

namespace Controllers;

use MVC\Router;

class AdminController {
    
    public static function index(Router $router) {
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración'
        ]);
    }
}