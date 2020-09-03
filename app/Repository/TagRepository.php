<?php

namespace App\Repository;
use App\Tag;

class TagRepository{

    public static function get(){
        return Tag::get()->all();
    }

}