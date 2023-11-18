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
        $categories = $this->cCategoryRepo->getTreeCategories()->toArray();
        $categories = $this->getCategoriesTable($categories);
        $categories = $this->cCategoryRepo->paginate($categories);
        // dd($categories);

        return view('CCategory::list', compact('categories'));
    }

    public function getCategoriesTable($categories, $char = '', &$result = [])
    {
        if (!empty($categories)) {
            foreach ($categories as $category) {
                $result[] = [
                    'id' => $category['id'],
                    'name' => $char . $category['name'],
                    'slug' => $category['slug'],
                    'parent_id' => $category['parent_id'],
                    'created_at' => $category['created_at'],
                    'updated_at' => $category['updated_at'],
                ];

                if (!empty($category['sub_categories'])) {
                    $this->getCategoriesTable($category['sub_categories'], $char . '--', $result);
                }
            }
        }

        return $result;
    }

    public function create()
    {
        $categories = $this->cCategoryRepo->getAllCategories();

        return view('CCategory::create', compact('categories'));
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
        $categories = $this->cCategoryRepo->getAllCategories();

        return view('CCategory::edit', compact('category', 'categories'));
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
