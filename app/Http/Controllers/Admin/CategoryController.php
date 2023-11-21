<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use App\Services\Admin\MediaService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService, MediaService $mediaService)
    {
        $this->categoryService = $categoryService;
        $this->mediaService = $mediaService;
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

    public function show($categoryId)
    {
        $medias = $this->mediaService->getListMediaCategory($categoryId);
        session(['check' => $categoryId]);

        return view('admin.category.show', compact('medias'));
    }

    public function store(CategoryRequest $request)
    {
        $inputs = $request->except('_token');

        $inputs['url_image'] = $this->categoryService->uploadFile($inputs['url_image'], 'admin/category');
        $inputs['admin_id'] = auth('admin')->user()->id;
        $inputs['priority'] = $this->categoryService->getCategoryMaxPriority();

        if ($this->categoryService->createModel($inputs)) {
            return redirect()->route('admin.category.index')->with('create_success', __('messages.create_success'));
        }

        return redirect()->back()->with('create_fail',  __('messages.create_fail'));
    }

    public function edit($id)
    {
        $category = $this->categoryService->findModel($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $inputs = $request->except('_token');

        if (isset($inputs['url_image']) && $inputs['url_image']) {
            $inputs['url_image'] = $this->categoryService->uploadFile($inputs['url_image'], 'admin/category', $category->url_image);
        } else {
            $inputs['url_image'] = $category->url_image;
        }
        $inputs['admin_id'] = auth('admin')->user()->id;

        if ($this->categoryService->updateModel($inputs, $category)) {
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
