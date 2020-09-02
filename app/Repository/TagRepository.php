<?php

namespace App\Repository;
use App\Tag;

class TagRepository{

    public function get(){
        $tags = Tag::get()->all();
        return $tags;
    }

}