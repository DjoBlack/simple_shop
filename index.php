<?php

require_once './configs/config.php';
require_once './configs/utils.php';
require_once './configs/connection.php';

require_once './models/product_model.php';
require_once './models/variant_model.php';

require_once './repos/product_repo.php';
require_once './repos/variant_repo.php';

require_once './controllers/base_controller.php';

session_start();

require_once './router.php';
require_once './controllers/main_controller.php';
require_once './controllers/admin_controllers/product_controller.php';
require_once './controllers/admin_controllers/variant_controller.php';

$router = new Router();

$router->register('GET', '/', function() {MainController::index(); }); //анонимноая функция 
$router->register('GET', '/about', function() {MainController::about_us(); }); //чтобы НЕ использовать встроенный интерпритатор
$router->register('GET', '/features', function() {MainController::features(); }); //и избежать метапрограммирования

$router->register('GET', '/admin/product_create', 'ProductController::createForm');  //метапрограммирование
$router->register('POST', '/admin/products', 'ProductController::create');

$router->register('GET', '/admin/variant_create', 'VariantController::createForm');
$router->register('POST', '/admin/variants', 'VariantController::create');

$router->serve();