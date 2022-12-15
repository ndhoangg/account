<?php 
use starter\core\Application;
use starter\handler\LoginHandler;
use starter\handler\RegisterHandler;
use starter\handler\UpdateInfoHandler;

$app = Application::getInstance();

/**
 * Define possible requests and their handlers
 */

$app->router->get('/login', 'login/LoginPage');
$app->router->post('/login', [LoginHandler::class, 'loginHandle']);
$app->router->get('/register', 'register/RegisterPage');
$app->router->post('/register', [RegisterHandler::class, 'registerHandle']);
$app->router->get('/account', 'account/AccountPage');
$app->router->post('/account', [UpdateInfoHandler::class, 'updateInfoHandle']);

?>