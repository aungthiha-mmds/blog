<?php

namespace App\Repository;
use App\Category;

class CategoryRepository{

    public function get(){
        $categories = Category::get()->all();
        return $categories;
    }

}