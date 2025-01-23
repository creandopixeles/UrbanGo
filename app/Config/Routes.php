<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');



#Rutas para los modulos de usuarios###############################################
#Vista inicial para ingresar al sistema como usuario
$routes->get('login', 'UsuariosController::login');
#Vista para visualizar la lista de los usuarios
$routes->get('usuarios/lista', 'UsuariosController::lista');
#Peticiones AJAX
$routes->get('usuarios/verifica_usuario_disponible', 'UsuariosController::verifica_usuario_disponible');
$routes->post('usuarios/validar_acceso', 'UsuariosController::validar_acceso');
$routes->post('usuarios/guardar', 'UsuariosController::guardar');
##################################################################################












#Rutas para los modulos de registro###############################################
#Vista para el registro de los beneficiarios
$routes->get('registro', 'RegistrosController::registro');
#Ruta del formulario para guardar un registro
$routes->post('registro/guardar', 'RegistrosController::guardar');
#Ruta para visualizar la lista de registros
$routes->get('registros/lista', 'RegistrosController::lista');
#Ruta para visualizar el detalle del registro
$routes->get('registros/detalle/(:num)', 'RegistrosController::detalle/$1');

#Peticiones Ajax
$routes->post('registros/rechazar/(:segment)', 'RegistrosController::rechazar/$1');

##################################################################################










#Rutas para el modulo de Beneficiarios ##############################################
$routes->post('beneficiario/check-email', 'BeneficiariosController::check_email');
##################################################################################











#Rutas para el modulo de Beneficiarios ##############################################
$routes->get('papeletas/nueva', 'PapeletasController::nueva');
#Peticiones AJAX

$routes->post('papeletas/generar', 'PapeletasController::generar');

##################################################################################





#Testeo
$routes->get('test_correo', 'BeneficiariosController::test_correo');
