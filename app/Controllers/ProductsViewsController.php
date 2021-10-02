<?php

namespace App\Controllers;
class ProductsViewsController extends Controller
{
    public function products($vars) {
        $this->productViewsManager -> render_products_page($vars);
    }

    public function products_by_category($vars) {
        $this->productViewsManager -> render_products_by_category($vars);
    }

    public function product_view($vars) {
        $this->productViewsManager -> render_product_page($vars);
    }

    public function product_create() {
        $this->productViewsManager -> render_form_create();
    }

    public function product_edit($vars) {
        $this->productViewsManager -> render_form_edit($vars);
    }
}