<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'UsuariosController::login');


#Rutas para los modulos de usuarios
$routes->get('usuarios/lista', 'UsuariosController::lista');
$routes->get('usuarios/verifica_usuario_disponible', 'UsuariosController::verifica_usuario_disponible');

$routes->post('usuarios/guardar', 'UsuariosController::guardar');





#Rutas Registros
$routes->get('registro', 'RegistrosController::registro');
$routes->post('registro/guardar', 'RegistrosController::guardar');



#Rutas Beneficiarios
$routes->post('beneficiario/check-email', 'BeneficiariosController::check_email');








#Testeo
$routes->get('test_correo', 'BeneficiariosController::test_correo');
