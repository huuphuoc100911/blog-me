<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Services\Staff\BlogCategoryService;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function __construct(BlogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories = $this->blogCategoryService->getListBlogCategory();

        return view('staff.blog-category.index', compact('blogCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryRequest $request)
    {
        if ($this->blogCategoryService->blogCategoryCreate($request->all())) {
            return redirect()->route('staff.blog-category.index')->with('create_success', __('messages.create_success'));
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
        $blogCategory = $this->blogCategoryService->getBlogCategory($id);

        return view('staff.blog-category.edit', compact('blogCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory)
    {
        if ($this->blogCategoryService->blogCategoryUpdate($request->all(), $blogCategory)) {
            return redirect()->route('staff.blog-category.index')->with('update_success', __('messages.update_success'));
        }

        return redirect()->back()->with('update_fail',  __('messages.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
