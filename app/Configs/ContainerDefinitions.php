<?php

use App\Models\ImageManager;
use League\Plates\Engine;
use Aura\SqlQuery\QueryFactory;
use Delight\Auth\Auth;
use Faker\Generator as FakeGenerator;
use Faker\Factory as FakeFactory;
use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
use JasonGrimes\Paginator;

return [
    PDO::class => function() {
        $driver = "mysql";
        $host = "localhost";
        $database_name = "project_level_3";
        $charset = "utf8";
        $user_name = "root";
        $password = "root";

        return new PDO("$driver:host=$host; dbname=$database_name; charset=$charset", "$user_name", "$password");
    },

    Engine::class => function() {
        return new Engine('../app/Views');
    },

    QueryFactory::class => function() {
        return new QueryFactory('mysql');
    },

    Auth::class => function($container) {
        return new Auth($container->get('PDO','','',false));
    },

    FakeGenerator::class => function() {
        return FakeFactory::create();
    },

    PHPMailer::class => function() {
        return new PHPMailer(true);
    }
];