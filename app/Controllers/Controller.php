<?php

namespace App\Controllers;

use League\Plates\Engine;
use App\Models\AuthHelper;

use App\Models\AdminViewsManager;
use App\Models\AuthManager;
use App\Models\ReviewManager;
use App\Models\UserManager;
use App\Models\CategoryManager;
use App\Models\ProductManager;
use App\Models\ProductViewsManager;

class Controller
{
    protected $engine;

    protected $adminManager;
    protected $authManager;
    protected $reviewManager;
    protected $userManager;
    protected $categoryManager;

    public function __construct(Engine $engine, AdminViewsManager $adminViewsManager, AuthManager $authManager,
                                ReviewManager $reviewManager, AuthHelper $authHelper, UserManager $userManager, 
                                CategoryManager $categoryManager, ProductViewsManager $productViewsManager, 
                                ProductManager $productManager)
    {
        $this->engine = $engine;
        $this->authHelper = $authHelper;
        
        $this->authManager = $authManager;
        $this->adminViewsManager = $adminViewsManager;
        $this->reviewManager = $reviewManager;
        $this->userManager = $userManager;
        $this->categoryManager = $categoryManager;
        $this->productViewsManager = $productViewsManager;
        $this->productManager = $productManager;
    }
}