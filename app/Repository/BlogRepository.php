<?php

namespace App\Repository;
use App\Blog;

class BlogRepository{

    public static function get(){
        if(\Auth::user()){
            $blogs = Blog::get();
        }else{
            $blogs = Blog::where('status', '1')->get();
        }
        return $blogs;
    }

    public static function show($id){
        return Blog::find($id);
    }

    public static function search($input){
        $blogs = \App\Blog::where('title', 'LIKE', '%' . $input . '%')
        ->orWhereHas('tags', function($q) use ($input) {
            return $q->where('name', 'LIKE', '%' . $input . '%');
        })->orWhereHas('category', function($q) use ($input) {
            return $q->where('name', 'LIKE', '%' . $input . '%');
        })->get();
        return $blogs;
    }

}