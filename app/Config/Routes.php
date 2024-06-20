<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/collection', 'CollectionController::index');
$routes->get('about', [Pages::class, 'about']);
$routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('/games', 'GameController::index');
$routes->get('/games/create', 'GameController::create');
$routes->post('/games/store', 'GameController::store');
$routes->get('/games/edit/(:num)', 'GameController::edit/$1');
$routes->post('/games/update/(:num)', 'GameController::update/$1');
$routes->get('/games/delete/(:num)', 'GameController::delete/$1');
