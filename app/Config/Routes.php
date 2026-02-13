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
$routes->get('/saloes/menu/(:num)', 'SalaoController::menu/$1');



$routes->get('/saloes/gerar-url/(:num)', 'SalaoController::gerarUrl/$1');
$routes->get('/saloes/menu/dono/(:num)', 'SalaoController::menuDono/$1');
$routes->get('/saloes/menu/cliente/(:segment)', 'SalaoController::menuCliente/$1');


$routes->get('horarios/(:num)', 'HorarioController::index/$1');
$routes->get('horarios/create/(:num)', 'HorarioController::create/$1');
$routes->post('horarios/store', 'HorarioController::store');
$routes->get('horarios/edit/(:num)', 'HorarioController::edit/$1');
$routes->post('horarios/update/(:num)', 'HorarioController::update/$1');
$routes->get('horarios/delete/(:num)', 'HorarioController::delete/$1');

$routes->post('/horarios/store-data', 'HorarioController::storeData');
$routes->get('/horarios/delete-data/(:num)', 'HorarioController::deleteData/$1');
$routes->get('horarios/edit-data/(:num)', 'HorarioController::edit/$1');
$routes->post('horarios/update-data/(:num)', 'HorarioController::update/$1');
$routes->get('horarios/delete-data/(:num)', 'HorarioController::deleteData/$1');
$routes->post('horarios/store-data', 'HorarioController::storeData');


$routes->get('servicos/(:num)', 'ServicoController::index/$1');

$routes->post('servicos/store-barbeiro', 'ServicoController::storeBarbeiro');
$routes->post('servicos/store-servico', 'ServicoController::storeServico');

/* ===== BARBEIRO ===== */
$routes->get('servicos/update-barbeiro/(:num)', 'ServicoController::editBarbeiro/$1');
$routes->post('servicos/update-barbeiro/(:num)', 'ServicoController::updateBarbeiro/$1');
$routes->get('servicos/delete-barbeiro/(:num)', 'ServicoController::deleteBarbeiro/$1');
$routes->get('/servicos/edit-barbeiro/(:num)', 'ServicoController::editBarbeiro/$1');

/* ===== SERVIÇO ===== */
$routes->get('servicos/update-servico/(:num)', 'ServicoController::editServico/$1');
$routes->post('servicos/update-servico/(:num)', 'ServicoController::updateServico/$1');
$routes->get('servicos/delete-servico/(:num)', 'ServicoController::deleteServico/$1');
