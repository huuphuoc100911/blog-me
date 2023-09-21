<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BlogCategoryStatus;
use App\Http\Controllers\Controller;
use App\Services\Admin\BlogCategoryService;
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

        return view('admin.blog-category.index', compact('blogCategories'));
    }

    public function changeStatusBlogCategory(Request $request)
    {
        $blogCategory = $this->blogCategoryService->changeStatusBlogCategory($request->blogCategoryId);

        if ($blogCategory->is_active === BlogCategoryStatus::ACTIVE) {
            return response()->json([
                'status' => '<span class="badge bg-success">Active</span>'
            ]);
        } else {
            return response()->json([
                'status' => '<span class="badge bg-danger">Inactive</span>'
            ]);
        }
    }
}
