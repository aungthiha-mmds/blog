<?php

namespace App\Services;

use App\Blog;

class BlogServices{

    public function store($request){
        $blog = new Blog;
        $blog->user_id = \Auth::user()->id;
        $blog->title = $request->title;
        $blog->category_id = $request->category;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $blog->save();
    }

    public function update($request, $id){
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->category_id = $request->category;
        $blog->status = $request->status;
        $blog->edit = 1;
        $blog->update();
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
    }
}