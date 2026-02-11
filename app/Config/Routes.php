<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'SalaoController::listar');        // Home
$routes->get('/saloes', 'SalaoController::listar');  // Lista de salões

$routes->get('/saloes/novo', 'SalaoController::novo');  
$routes->post('/saloes/salvar', 'SalaoController::salvar'); 

$routes->get('/saloes/editar/(:num)', 'SalaoController::editar/$1'); 
$routes->post('/saloes/atualizar/(:num)', 'SalaoController::atualizar/$1'); 

$routes->get('/saloes/deletar/(:num)', 'SalaoController::deletar/$1'); 
