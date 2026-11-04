<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->post('login/proses', 'Login::proses');
$routes->get('logout', 'Login::logout');
$routes->get('dashboard', 'Dashboard::index');

$routes->get('products', 'Product::index');
$routes->post('products/simpan', 'Product::simpan');
$routes->post('products/hapus/(:num)', 'Product::hapus/$1');
$routes->get('products/edit/(:num)', 'Product::edit/$1');
$routes->post('products/update/(:num)', 'Product::update/$1');
$routes->get('sales', 'Sale::index');
$routes->post('sales/simpan', 'Sale::simpan');
$routes->get('report', 'Report::index');


