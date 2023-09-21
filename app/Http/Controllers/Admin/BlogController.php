<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BlogStatus;
use App\Http\Controllers\Controller;
use App\Services\Admin\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct(BlogService $blogService)
    {
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

        return view('admin.blog.index', compact('blogs'));
    }

    public function changeStatusBlog(Request $request)
    {
        $blog = $this->blogService->changeStatusBlog($request->blogId);

        if ($blog->is_active === BlogStatus::ACTIVE) {
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
