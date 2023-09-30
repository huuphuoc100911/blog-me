<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Services\Api\CategoryService;

class CategoryController extends BaseController
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getListCategory()
    {
        $listCategory = $this->categoryService->getListCategory();

        return CategoryResource::collection($listCategory);
    }
}
