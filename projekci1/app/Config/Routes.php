<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */



$routes->get('/', 'Login::index');
$routes->post('login', 'Login::login_action');
$routes->get('regist', 'Regist::index');
$routes->post('registrasi', 'Regist::regist_action');
$routes->get('forgot_password', 'ForgotPassword::index');
$routes->get('logout', 'Login::logout');

// routes admin
$routes->get('admin/home', 'Admin\Home::index', ['filter' => 'adminFilter']);
$routes->get('admin/form', 'Admin\Form_mhs::index', ['filter' => 'adminFilter']);
$routes->post('admin/store', 'Admin\Form_mhs::store', ['filter' => 'adminFilter']);
$routes->post('admin/update/(:segment)', 'Admin\Form_mhs::update/$1', ['filter' => 'adminFilter']);
$routes->get('admin/edit/(:segment)', 'Admin\Form_mhs::edit/$1', ['filter' => 'adminFilter']);
$routes->get('admin/delete/(:segment)', 'Admin\Form_mhs::delete/$1', ['filter' => 'adminFilter']);
$routes->get('admin/export', 'Admin\Form_mhs::export', ['filter' => 'adminFilter']);
$routes->get('admin/pdf', 'Admin\Form_mhs::pdf', ['filter' => 'adminFilter']);


$routes->get('user/home', 'User\Home::index', ['filter' => 'userFilter']);
