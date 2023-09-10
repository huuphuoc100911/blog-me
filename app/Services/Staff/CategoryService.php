<?php

namespace App\Services\Staff;

use App\Models\Category;
use App\Services\Helper\FilterTrait;
use App\Services\Staff\BaseService;

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
}
