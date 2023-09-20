<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\BlogRequets;
use App\Models\Blog;
use App\Services\Admin\CategoryService;
use App\Services\Staff\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(BlogService $blogService, CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
        $this->blogService = $blogService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogService->getListBlogs();

        return view("staff.blog.index", compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->getListCategoryPluck();

        return view('staff.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequets $request)
    {
        if ($this->blogService->blogCreate($request->all())) {
            return redirect()->route('staff.blog.index')->with('create_success', __('messages.create_success'));
        }

        return redirect()->back()->with('create_fail',  __('messages.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogService->getBlog($id);
        $categories = $this->categoryService->getListCategoryPluck();

        return view('staff.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequets $request, Blog $blog)
    {
        if ($this->blogService->blogUpdate($request->all(), $blog)) {
            return redirect()->route('staff.blog.index')->with('update_success',  __('messages.update_success'));
        }

        return redirect()->back()->with('update_fail',  __('messages.update_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        if ($this->blogService->blogDelete($blog)) {
            return redirect()->back()->with('delete_success',  __('messages.delete_success'));
        }

        return redirect()->back()->with('delete_fail',  __('messages.delete_fail'));
    }
}
