<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Services\BlogServices;
use App\Repository\BlogRepository;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Blog;


class BlogController extends Controller
{
    public function __construct(){
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogRepository::get();
        if(\Request()->get('query')){
            $blogs = BlogRepository::search(\Request()->get('query'));
        }
        return view("home", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = TagRepository::get();
        $categoires = CategoryRepository::get();
        return view('blog.create', compact('categoires', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $request->validated();
        BlogServices::store($request);
        return back()->with('success', 'Create Blog Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($query)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $tags = TagRepository::get();
        $categoires = CategoryRepository::get();
        return view('blog.edit', compact('blog', 'categoires', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $request->validated();
        BlogServices::update($request, $id);
        return back()->with('success', 'Update Blog Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        BlogServices::destroy($blog);
        return back();
    }
}
