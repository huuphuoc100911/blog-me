<?php

namespace App\Services\User;

use App\Models\Blog;
use App\Models\InfoCompany;
use App\Models\Staff;
use App\Services\Helper\FilterTrait;

class UserService extends BaseService
{
    use FilterTrait;

    public function __construct(Staff $model, InfoCompany $infoCompany, Blog $blog)
    {
        $this->model = $model;
        $this->infoCompany = $infoCompany;
        $this->blog = $blog;
    }

    public function getListStaff()
    {
        return $this->model->get();
    }

    public function getInfoCompany()
    {
        return $this->infoCompany->findOrFail(1);
    }

    public function getListBlog($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->blog->whereNull('deleted_at')
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

    public function getBlogOther($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->blog->whereNull('deleted_at')
            ->where('id', '!=', $filters)
            ->orderByDesc('priority')->take(6)->get();
    }

    public function getBlogDetail($id)
    {
        return $this->blog->findOrFail($id);
    }
}
