<?php

namespace App\Services\Admin;

use App\Models\Category;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class CategoryService extends BaseService
{
    use FilterTrait;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getListCategory($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->model
            ->whereNull('deleted_at')
            ->orderByDesc('priority');

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function getCategory($id)
    {
        return $this->model->findOrFail($id);
    }

    public function createCategory($inputs)
    {
        $adminId = auth('admin')->user()->id;
        $path = Storage::put('admin/category', $inputs['url_image']);
        $categoryHasMaxPriority = $this->model->orderByDesc('priority')->first();

        $data = [
            'admin_id' => $adminId,
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'url_image' => $path,
            'priority' => $categoryHasMaxPriority ? $categoryHasMaxPriority->priority + 1 : 1,
            'is_active' => $inputs['is_active'],
        ];

        return $this->model->create($data);
    }

    public function updateCategory($inputs, $category)
    {
        $adminId = auth('admin')->user()->id;

        $data = [
            'admin_id' => $adminId,
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'is_active' => $inputs['is_active'],
        ];

        if (isset($inputs['url_image'])) {
            $path = Storage::put('admin/category', $inputs['url_image']);
            $data['url_image'] = $path;
            Storage::delete($category->url_image);
        }

        return $category->update($data);
    }

    public function deleteCategory($category)
    {
        Storage::delete($category->url_image);

        return $category->update([
            'deleted_at' => Carbon::now()
        ]);
    }
}
