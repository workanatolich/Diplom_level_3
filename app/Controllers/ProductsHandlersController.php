<?php

namespace App\Controllers;
class ProductsHandlersController extends Controller{
    public function product_creator() { 
        $this->productManager -> create();
    }

    public function product_editor($vars) {
        $this->productManager -> edit($vars);
    }

    public function product_deletor($vars) {
        $this->productManager -> delete($vars);
    }
}