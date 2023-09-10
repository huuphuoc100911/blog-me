<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Services\Staff\CategoryService;
use App\Services\Staff\MediaService;
use Illuminate\Http\Request;

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

        return view('staff.category.index', compact('categories'));
    }

    public function show($categoryId)
    {
        $medias = $this->mediaService->getListMediaCategory($categoryId);

        return view('staff.media.index', compact('medias'));
    }
}
