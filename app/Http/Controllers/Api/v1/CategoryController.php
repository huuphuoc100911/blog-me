<?php

namespace App\Http\Controllers\Api\v1;

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

    public function getCategory($categoryId)
    {
        $category = $this->categoryService->getCategory($categoryId);

        return new CategoryResource($category);
    }
}
