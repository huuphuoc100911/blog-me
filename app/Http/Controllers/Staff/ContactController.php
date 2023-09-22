<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\ContactCategoryRequest;
use App\Services\Staff\CategoryService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function contactAdmin()
    {
        return view('staff.contact.create');
    }

    public function listSuggestCategory()
    {
        $listSuggestCategory = $this->categoryService->getListSuggestCategory();

        return view('staff.contact.index', compact('listSuggestCategory'));
    }

    public function postContactAdmin(ContactCategoryRequest $request)
    {
        if ($this->categoryService->categorySuggestCreate($request->all())) {
            return redirect()->route('staff.list-suggest-category')->with('create_success',  __('messages.create_success'));
        }

        return redirect()->back()->with('create_fail',  __('messages.create_fail'));
    }
}
