<?php

namespace Modules\CCategory\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CCategory\src\Http\Requests\CCategoryRequest;
use Modules\CCategory\src\Repositories\CCategoryRepository;

class CategoryController extends Controller
{
    protected $cCategoryRepo;

    public function __construct(CCategoryRepository $cCategoryRepo)
    {
        $this->cCategoryRepo = $cCategoryRepo;
    }

    public function index()
    {
        $categories = $this->cCategoryRepo->getCategories();

        return view('CCategory::list', compact('categories'));
    }

    public function create()
    {
        return view('CCategory::create');
    }

    public function store(CCategoryRequest $request)
    {
        if ($this->cCategoryRepo->create($request->all())) {
            return redirect()->route('manager.categories.index')->with('msg', __('messages.create.success'));
        }

        return redirect()->route('manager.categories.index')->with('msg', __('messages.create.failure'));
    }

    public function edit($id)
    {
        $category = $this->cCategoryRepo->find($id);

        return view('CCategory::edit', compact('category'));
    }

    public function update(CCategoryRequest $request, $id)
    {
        if ($this->cCategoryRepo->update($id, $request->all())) {
            return redirect()->route('manager.categories.index')->with('msg', __('messages.update.success'));
        }

        return redirect()->route('manager.categories.index')->with('msg', __('messages.update.failure'));
    }

    public function delete($id)
    {
        if ($this->cCategoryRepo->delete($id)) {
            return redirect()->route('manager.categories.index')->with('msg', __('messages.delete.success'));
        }

        return redirect()->route('manager.categories.index')->with('msg', __('messages.delete.failure'));
    }
}
