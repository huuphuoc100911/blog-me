<?php

namespace App\Services\Staff;

use App\Enums\CategoryAccept;
use App\Enums\CategoryStatus;
use App\Models\Category;
use App\Services\BaseService;
use App\Services\Helper\FilterTrait;
use Illuminate\Support\Facades\Storage;

class CategoryService extends BaseService
{
    use FilterTrait;

    // public function __construct(Category $model)
    // {
    //     $this->model = $model;
    // }

    public function getModel()
    {
        return Category::class;
    }

    public function getListCategory($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->model
            ->whereNull('deleted_at')
            ->orderByDesc('id');

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function getListSuggestCategory($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->model->where('staff_id', auth('staff')->user()->id);

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function categorySuggestCreate($inputs)
    {
        $path = Storage::put('admin/category', $inputs['url_image']);
        $categoryHasMaxPriority = $this->model->orderByDesc('id')->first();

        $data = [
            'admin_id' => 1,
            'staff_id' => auth('staff')->user()->id,
            'title' => $inputs['title'],
            'url_image' => $path,
            'description' => $inputs['description'],
            'priority' => $categoryHasMaxPriority ? $categoryHasMaxPriority->priority + 1 : 1,
            'is_active' => CategoryStatus::ACTIVE,
            'is_accept' => CategoryAccept::INACCEPT,
        ];

        return $this->model->create($data);
    }
}
