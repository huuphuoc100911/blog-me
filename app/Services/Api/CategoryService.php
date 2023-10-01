<?php

namespace App\Services\Api;

use App\Models\Category;
use App\Services\Helper\FilterTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            ->with('staff')
            ->with('admin');

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function getCategory($categoryId)
    {
        return $this->model->findOrFail($categoryId);
    }
}
