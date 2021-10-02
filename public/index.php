<?php

if(!session_id()) @session_start();
require '../vendor/autoload.php';

use DI\Container;
use DI\ContainerBuilder;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\Controllers\ProductsViewsController', 'products']);
    $r->addGroup('/products', function (FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/', ['App\Controllers\ProductsViewsController', 'products']);
        $r->addRoute('GET', '/{page:\d+}', ['App\Controllers\ProductsViewsController', 'products']);
        $r->addRoute('GET', '/{category:\w+}/{page:\d+}', ['App\Controllers\ProductsViewsController', 'products_by_category']);
    });

    $r->addGroup('/product', function(FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '/{id:\d+}', ['App\Controllers\ProductsViewsController', 'product_view']);
        $r->addRoute('GET', '/create', ['App\Controllers\ProductsViewsController', 'product_create']);

        $r->addRoute('POST', '/edit/{product_id:\d+}', ['App\Controllers\ProductsViewsController', 'product_edit']);
        
        $r->addRoute('POST', '/creator', ['App\Controllers\ProductsHandlersController', 'product_creator']);
        $r->addRoute('POST', '/editor/{product_id:\d+}', ['App\Controllers\ProductsHandlersController', 'product_editor']);
        $r->addRoute('POST', '/deletor/{product_id:\d+}', ['App\Controllers\ProductsHandlersController', 'product_deletor']);
    });

    $r->addGroup('/review', function(FastRoute\RouteCollector $r) {
        $r->addRoute('POST', '/creator/{product_id:\d+}', ['App\Controllers\ReviewsHandlersController', 'review_creator']);
        $r->addRoute('POST', '/editor/{product_id:\d+}{review_id:\d+}', ['App\Controllers\ReviewsHandlersController', 'review_editor']);
        $r->addRoute('POST', '/deletor/{product_id:\d+}{review_id:\d+}', ['App\Controllers\ReviewsHandlersController', 'review_deletor']);
    });

    $r->addGroup('/admin', function(FastRoute\RouteCollector $r) {
        $r->addRoute('GET', '', ['App\Controllers\AdminController', 'admin']);
        $r->addRoute('GET', '/', ['App\Controllers\AdminController', 'admin']);
        $r->addRoute('GET', '/users', ['App\Controllers\AdminController', 'admin_users']);
        $r->addRoute('GET', '/categories', ['App\Controllers\AdminController', 'admin_categories']);
        $r->addRoute('GET', '/products', ['App\Controllers\AdminController', 'admin_products']);
        $r->addRoute('GET', '/reviews', ['App\Controllers\AdminController', 'admin_reviews']);
        
        $r->addGroup('/category', function(FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/create', ['App\Controllers\AdminController', 'admin_category_create']);
            $r->addRoute('GET', '/edit/{category_id:\d+}', ['App\Controllers\AdminController', 'admin_category_edit']);

            $r->addRoute('POST', '/creator', ['App\Controllers\AdminHandlersController', 'category_create']);
            $r->addRoute('POST', '/editor/{category_id:\d+}', ['App\Controllers\AdminHandlersController', 'category_edit']);
            $r->addRoute('POST', '/deletor/{category_id:\d+}', ['App\Controllers\AdminHandlersController', 'category_delete']);
        });

        $r->addGroup('/product', function(FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/create', ['App\Controllers\ProductsViewsController', 'product_create']);
            $r->addRoute('GET', '/edit/{product_id:\d+}', ['App\Controllers\ProductsViewsController', 'product_edit']);
            $r->addRoute('GET', '/delete/{product_id:\d+}', ['App\Controllers\ProductsHandlersController', 'product_deletor']);
            $r->addRoute('GET', '/view/{product_id:\d+}', ['App\Controllers\ProductsViewsController', 'product_view']);
        });

        $r->addGroup('/review', function(FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/create', ['App\Controllers\AdminController', 'admin_review_create']);
            $r->addRoute('GET', '/edit/{review_id:\d+}', ['App\Controllers\AdminController', 'admin_review_edit']);
            
            $r->addRoute('POST', '/creator', ['App\Controllers\AdminHandlersController', 'review_create']);
            $r->addRoute('POST', '/editor/{review_id:\d+}', ['App\Controllers\AdminHandlersController', 'review_edit']);
            $r->addRoute('POST', '/deletor/{review_id:\d+}', ['App\Controllers\AdminHandlersController', 'review_delete']);
        });

        $r->addGroup('/user', function(FastRoute\RouteCollector $r) {
            $r->addRoute('GET', '/create', ['App\Controllers\AdminController', 'admin_user_create']);
            $r->addRoute('GET', '/edit/{user_id:\d+}', ['App\Controllers\AdminController', 'admin_user_edit']);
            
            $r->addRoute('POST', '/deletor/{user_id:\d+}', ['App\Controllers\AdminHandlersController', 'user_delete']);
            $r->addRoute('POST', '/creator', ['App\Controllers\AdminHandlersController', 'user_create']);
            $r->addRoute('POST', '/editor/{user_id:\d+}', ['App\Controllers\AdminHandlersController', 'user_edit']);
        });

    });

    $r->addRoute('GET', '/login', ['App\Controllers\AuthController', 'login']);
    $r->addRoute('GET', '/registration', ['App\Controllers\AuthController', 'registration']);
    $r->addRoute('GET', '/confirm_email', ['App\Controllers\AuthController', 'confirm_email']);
    
    $r->addRoute('POST', '/logger', ['App\Controllers\AuthHandlersController', 'logger']);
    $r->addRoute('POST', '/logout', ['App\Controllers\AuthHandlersController', 'logout']);
    $r->addRoute('POST', '/register', ['App\Controllers\AuthHandlersController', 'register']);
    $r->addRoute('POST', '/confirmer_email', ['App\Controllers\AuthHandlersController', 'confirmer_email']);

});

$containerBuilder = new ContainerBuilder();
$containerBuilder ->addDefinitions('../app/Configs/ContainerDefinitions.php');

$container = new Container();
$container = $containerBuilder->build();

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $container->call(['App\Controllers\ErrorPagesController', 'page_not_found']);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $container->call(['App\Controllers\ErrorPagesController', 'method_not_allowed']);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $controller = $handler[0];
        $action = $handler[1];
        $vars = $routeInfo[2];

        $container->call([$controller, $action], [$vars]);
        break;
}