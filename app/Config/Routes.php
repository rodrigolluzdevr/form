<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->post('/upload', 'Upload::store', ['as' => 'upload']);
