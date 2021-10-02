<?php

namespace App\Models;

class Helper
{
    public static function redirect_to($path) {
        header("Location: $path");
    }
}