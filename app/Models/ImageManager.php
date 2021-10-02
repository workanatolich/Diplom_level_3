<?php

namespace App\Models;
use Intervention\Image\ImageManagerStatic as Image;

class ImageManager
{
    public function __construct()
    {
        Image::configure(array('driver'=>'imagick'));   
    }

    public function upload_image($file) {
        
        $file = Image::make($file['tmp_name'])->resize('400', '400');
        $extension = 'jpg'; 
        $filename = uniqid() .'.' .$extension;
        $path = "/img/products/$filename";  
        $file -> save("img\products\\$filename",'','jpg');
        
        return $path;
    }

    public function delete_image($filename) {
        if (file_exists($filename) && $filename != '/img/default/product.png') {
            unlink($filename);
        }
    }

}