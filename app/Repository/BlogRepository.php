<?php

namespace App\Repository;
use App\Blog;

class BlogRepository{

    public function get(){
        if(\Auth::user()){
            $blogs = Blog::get()->all();
        }else{
            $blogs = Blog::where('status', '1')->get();
        }
        return $blogs;
    }

    public function show($id){
        $blog = Blog::find($id);
        return $blog;
    }


}