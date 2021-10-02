<?php

namespace App\Models;

use PDO;
use Delight\Auth\Auth;
use Faker\Generator;
use League\Plates\Engine;

use App\Models\Mailer;
use App\Models\QueryBuilder;
use App\Models\ImageManager;
use App\Models\AuthHelper;

class ManagerModel {
   public $pdo;
   public $db;
   public $mailer;
   public $engine;
   public $auth;
   public $faker;
   public $authHelper;
   public $imageManager;

    public function __construct(PDO  $pdo, QueryBuilder $queryBuilder, Mailer $mailer, Engine $engine,
                                Auth $auth, Generator $fakegenerator, ImageManager $imageManager,
                                AuthHelper $authHelper)
    {
        $this->pdo = $pdo;
        $this->db = $queryBuilder;
        $this->mailer = $mailer;
        $this->engine = $engine;
        $this->auth = $auth;
        $this->faker = $fakegenerator;

        $this->imageManager = $imageManager;
        $this->authHelper = $authHelper;
    }
}