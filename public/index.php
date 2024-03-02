<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\ArticulosController;
use MVC\Router;
use Controllers\AuthController;
use Controllers\CursosController;
use Controllers\DashboardController;
use Controllers\LearnController;
use Controllers\MediosController;
use Controllers\PonentesController;
use Controllers\RevistaController;
use Controllers\UsuarioController;

$router = new Router();


// Login
$router->get('/auth/login', [AuthController::class, 'login']);
$router->post('/auth/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/auth/registro', [AuthController::class, 'registro']);
$router->post('/auth/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/auth/olvide', [AuthController::class, 'olvide']);
$router->post('/auth/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/auth/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/auth/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/auth/mensaje', [AuthController::class, 'mensaje']);
$router->get('/auth/confirmar-cuenta', [AuthController::class, 'confirmar']);

$router->get('/auth/mensaje-reestablecer', [AuthController::class, 'mensajeReestablecer']);

$router->get('/auth/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/auth/reestablecer', [AuthController::class, 'reestablecer']);


// Admin
$router->get('/admin/dashboard', [AdminController::class, 'index']);


// Ponentes
$router->get('/admin/ponentes', [PonentesController::class, 'index']);

$router->get('/admin/ponentes/crear', [PonentesController::class, 'crear']);
$router->post('/admin/ponentes/crear', [PonentesController::class, 'crear']);

$router->get('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/editar', [PonentesController::class, 'editar']);
$router->post('/admin/ponentes/eliminar', [PonentesController::class, 'eliminar']);


// Cursos
$router->get('/admin/cursos', [CursosController::class, 'index']);

$router->get('/admin/cursos/crear', [CursosController::class, 'crear']);
$router->post('/admin/cursos/crear', [CursosController::class, 'crear']);

    // Vista
$router->get('/admin/cursos/learn', [CursosController::class, 'learn']);

    // Tablas
$router->get('/admin/cursos/learn/alerts', [CursosController::class, 'alertas']);
$router->get('/admin/cursos/learn/docs', [CursosController::class, 'documentos']);
$router->get('/admin/cursos/learn/events', [CursosController::class, 'eventos']);

    // Alertas
$router->get('/admin/cursos/learn/alerts/crear', [CursosController::class, 'alertas_crear']);
$router->post('/admin/cursos/learn/alerts/crear', [CursosController::class, 'alertas_crear']);

$router->get('/admin/cursos/learn/alerts/editar', [CursosController::class, 'alertas_editar']);
$router->post('/admin/cursos/learn/alerts/editar', [CursosController::class, 'alertas_editar']);

$router->post('/admin/cursos/learn/alerts/eliminar', [CursosController::class, 'alertas_eliminar']);

    // Documentos
$router->get('/admin/cursos/learn/docs/crear', [CursosController::class, 'documentos_crear']);
$router->post('/admin/cursos/learn/docs/crear', [CursosController::class, 'documentos_crear']);

$router->post('/admin/cursos/learn/docs/eliminar', [CursosController::class, 'documentos_eliminar']);

    // Eventos
$router->get('/admin/cursos/learn/events/crear', [CursosController::class, 'eventos_crear']);
$router->post('/admin/cursos/learn/events/crear', [CursosController::class, 'eventos_crear']);

$router->get('/admin/cursos/learn/events/editar', [CursosController::class, 'eventos_editar']);
$router->post('/admin/cursos/learn/events/editar', [CursosController::class, 'eventos_editar']);

$router->post('/admin/cursos/learn/events/eliminar', [CursosController::class, 'eventos_eliminar']);

    // Cursos Editar
$router->get('/admin/cursos/editar', [CursosController::class, 'editar']);
$router->post('/admin/cursos/editar', [CursosController::class, 'editar']);

$router->post('/admin/cursos/eliminar', [CursosController::class, 'eliminar']);


// Usuarios
$router->get('/admin/usuarios', [UsuarioController::class, 'index']);

$router->get('/admin/usuarios/editar', [UsuarioController::class, 'editar']);
$router->post('/admin/usuarios/editar', [UsuarioController::class, 'editar']);

$router->get('/admin/usuario/admin', [UsuarioController::class, 'admin']);
$router->get('/admin/usuario/admin-logout', [UsuarioController::class, 'admin_logout']);

$router->post('/admin/usuarios/eliminar', [UsuarioController::class, 'eliminar']);


// Medios Youtube
$router->get('/admin/medios', [MediosController::class, 'index']);

$router->get('/admin/medios/crear', [MediosController::class, 'crear']);
$router->post('/admin/medios/crear', [MediosController::class, 'crear']);

$router->get('/admin/medios/editar', [MediosController::class, 'editar']);
$router->post('/admin/medios/editar', [MediosController::class, 'editar']);

$router->post('/admin/medios/eliminar', [MediosController::class, 'eliminar']);


// Medios 
$router->get('/admin/medios/crear-video', [MediosController::class, 'crear_video']);
$router->post('/admin/medios/crear-video', [MediosController::class, 'crear_video']);

$router->get('/admin/medios/editar-video', [MediosController::class, 'editar_video']);
$router->post('/admin/medios/editar-video', [MediosController::class, 'editar_video']);


// Revista
$router->get('/admin/revista', [RevistaController::class, 'index']);

$router->get('/admin/revista/crear', [RevistaController::class, 'crear']);
$router->post('/admin/revista/crear', [RevistaController::class, 'crear']);

$router->get('/admin/revista/editar', [RevistaController::class, 'editar']);
$router->post('/admin/revista/editar', [RevistaController::class, 'editar']);

$router->post('/admin/revista/eliminar', [RevistaController::class, 'eliminar']);


// Articulos
$router->get('/admin/articulos', [ArticulosController::class, 'index']);

$router->get('/admin/articulos/crear', [ArticulosController::class, 'crear']);
$router->post('/admin/articulos/crear', [ArticulosController::class, 'crear']);

$router->get('/admin/articulos/editar', [ArticulosController::class, 'editar']);
$router->post('/admin/articulos/editar', [ArticulosController::class, 'editar']);

$router->post('/admin/articulos/eliminar', [ArticulosController::class, 'eliminar']);


// Dashboard
$router->get('/', [DashboardController::class, 'index']);

    // Cursos
$router->get('/cursos', [DashboardController::class, 'cursos']);
$router->post('/cursos', [DashboardController::class, 'cursos']);

    // Visualizacion de Curso
$router->get('/cursos/learn', [LearnController::class, 'index']);
$router->post('/cursos/learn', [LearnController::class, 'index']);

$router->get('/cursos/learn/dashboard', [LearnController::class, 'dashboard']);
$router->post('/cursos/learn/dashboard', [LearnController::class, 'dashboard']);

    // Quienes Somos
$router->get('/quienes-somos', [DashboardController::class, 'quienes_somos']);

    // Medios
$router->get('/medios', [DashboardController::class, 'medios']);
$router->get('/medios-articulo', [DashboardController::class, 'medios_articulo']);

    // Carrito
$router->get('/carrito', [DashboardController::class, 'carrito']);
$router->post('/carrito-eliminar', [DashboardController::class, 'carrito_eliminar']);

$router->post('/api/paypal/update-compras', [DashboardController::class, 'carritoConfirmar']);


    // Ponentes Informacion
$router->get('/ponente-informacion', [DashboardController::class, 'ponente']);

    // Contacto
$router->get('/contacto', [DashboardController::class, 'contacto']);
$router->post('/contacto', [DashboardController::class, 'contacto']);

    // Donaciones
$router->get('/donaciones', [DashboardController::class, 'donaciones']);
$router->post('/donaciones', [DashboardController::class, 'donaciones']);


    // Revista
$router->get('/revista', [DashboardController::class, 'revista']);

$router->get('/revista/doc', [DashboardController::class, 'revista_doc']);

$router->get('/revista/suscripcion', [DashboardController::class, 'activarSuscripcion']);
$router->post('/revista/suscripcion', [DashboardController::class, 'activarSuscripcion']);



$router->comprobarRutas();