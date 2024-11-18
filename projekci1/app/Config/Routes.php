<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  $routes->setDefaultController('Home');
//  $routes->setDefaultMethod('index');
//  $routes->setTranslateURIDashes(false);
//  $routes->setAutoRoute(true);

$routes->get('/', 'Login::index');
$routes->post('login', 'Login::login_action');
$routes->get('regist', 'Regist::index');
$routes->get('forgot_password', 'ForgotPassword::index');
$routes->get('logout', 'Login::logout');

$routes->get('admin/home', 'Admin\Home::index', ['filter' => 'adminFilter']);
$routes->get('user/home', 'User\Home::index', ['filter' => 'userFilter']);
