<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryAccept;
use App\Http\Controllers\Controller;
use App\Services\Admin\CategoryService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function listSuggestCategory()
    {
        $listSuggestCategory = $this->categoryService->getListSuggestCategory();

        return view('admin.category.category-suggest', compact('listSuggestCategory'));
    }

    public function approveCategory(Request $request)
    {
        $category = $this->categoryService->approveCategory($request->categoryId);

        if ($category->is_accept === CategoryAccept::ACCEPT) {
            $count = $this->categoryService->countCategorySuggest();

            return response()->json([
                'status' => '<span class="badge bg-label-success me-1">Phê duyệt</span>',
                'count' => $count,
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
