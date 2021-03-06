<?php

namespace App\Services;

use App\Tag;
use App\Blog;

class BlogServices{

    public static function store($request){
        $blog = new Blog;
        $blog->user_id = \Auth::user()->id;
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->save();
        $tags = Tag::find($request->tag);
        $blog->tags()->attach($tags);
    }

    public static function update($request, $id){
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category_id = $request->category;
        $blog->status = $request->status;
        $blog->edit = 1;
        $blog->update();
        $blog->tags()->detach($blog->tags);
        $tags = Tag::find($request->tag);
        $blog->tags()->attach($tags);
    }

    public static function destroy($blog){
        $blog->delete();
    }
}