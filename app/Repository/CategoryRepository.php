<?php

namespace App\Repository;
use App\Category;

class CategoryRepository{

    public static function get(){
        return Category::get()->all();
    }

}