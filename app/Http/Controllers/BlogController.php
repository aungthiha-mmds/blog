<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Services\BlogServices;
use App\Repository\BlogRepository;
use App\Repository\CategoryRepository;


class BlogController extends Controller
{
    public function __construct(BlogServices $blogService, BlogRepository $blogRepository, CategoryRepository $categoryRepository){
        $this->blogService = $blogService;
        $this->blogRepository = $blogRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->get();
        return view("home", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoires = $this->categoryRepository->get();
        return view('blog.create', compact('categoires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $validated = $request->validated();
        $this->blogService->store($request);
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
        dd($query);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->show($id);
        $categoires = $this->categoryRepository->get();
        return view('blog.edit', compact('blog', 'categoires'));
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
        $validated = $request->validated();
        $this->blogService->update($request, $id);
        return back()->with('success', 'Update Blog Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->destroy($id);
    }
}
