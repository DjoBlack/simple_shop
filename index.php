<?php

session_start();

require_once './configs/config.php';
require_once './configs/utils.php';
require_once './configs/connection.php';

require_once './models/product_model.php';
require_once './models/variant_model.php';
require_once './models/user_model.php';

require_once './repos/product_repo.php';
require_once './repos/variant_repo.php';
require_once './repos/user_repo.php';

require_once './controllers/base_controller.php';

BaseController::ensureSession('user');
BaseController::ensureSession('cart');

require_once './controllers/cart_controller.php';

require_once './router.php';
require_once './controllers/main_controller.php';
require_once './controllers/admin_controllers/product_controller.php';
require_once './controllers/admin_controllers/variant_controller.php';
require_once './controllers/user_controller.php';



$router = new Router();

$router->register('GET', '/user/register_form', 'UserController::registerForm');
$router->register('POST', '/user/register', function() {UserController::register(); });

$router->register('GET', '/user/login_form', 'UserController::loginForm');
$router->register('POST', '/user/login', function() {UserController::login(); });

$router->register('POST', '/user/logout', function() {UserController::logout(); });

$router->register('GET', '/cart', 'CartController::index');
$router->register('POST', '/cart/add', 'CartController::addToCart');
$router->register('POST', '/cart/substract', 'CartController::substractFromCart');
$router->register('POST', '/cart/remove', 'CartController::removeFromCart');

$router->register('GET', '/', function() {MainController::index(); });      //анонимноая функция 
$router->register('GET', '/about', function() {MainController::about_us(); }); //чтоб НЕ использ.
$router->register('GET', '/features', function() {MainController::features(); }); //интерпритатор

$router->register('GET', '/admin/product_form', 'ProductController::createForm'); 
$router->register('POST', '/admin/product_create', 'ProductController::create'); //метапрограммирование

$router->register('GET', '/admin/variant_form', 'VariantController::createForm');
$router->register('POST', '/admin/variant_create', 'VariantController::create');

$router->serve();