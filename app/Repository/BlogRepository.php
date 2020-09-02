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

    public function search($input){
        $blogs = \App\Blog::where('title', 'LIKE', '%' . $input . '%')
        ->orWhereHas('tags', function($q) use ($input) {
            return $q->where('name', 'LIKE', '%' . $input . '%');
        })->orWhereHas('category', function($q) use ($input) {
            return $q->where('name', 'LIKE', '%' . $input . '%');
        })->get();
        return $blogs;
    }

}