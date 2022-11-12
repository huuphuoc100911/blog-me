<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getListCategory();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        if ($this->categoryService->createCategory($request->all())) {
            return redirect()->route('admin.category.index')->with('create_success', __('messages.create_success'));
        }

        return redirect()->back()->with('create_fail',  __('messages.create_success'));
    }

    public function edit($id)
    {
        $category = $this->categoryService->getCategory($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        if ($this->categoryService->updateCategory($request->all(), $category)) {
            return redirect()->route('admin.category.index')->with('update_success',  __('messages.update_success'));
        }

        return redirect()->back()->with('update_fail',  __('messages.update_fail'));
    }

    public function destroy(Category $category)
    {
        if ($this->categoryService->deleteCategory($category)) {
            return redirect()->back()->with('delete_success',  __('messages.delete_success'));
        }

        return redirect()->back()->with('delete_fail',  __('messages.delete_fail'));
    }
}
