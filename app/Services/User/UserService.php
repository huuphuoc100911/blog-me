<?php

namespace App\Services\User;

use App\Enums\BlogStatus;
use App\Models\Blog;
use App\Models\InfoCompany;
use App\Models\Staff;
use App\Models\User;
use App\Services\Helper\FilterTrait;

class UserService extends BaseService
{
    use FilterTrait;

    public function __construct(User $model, Staff $staff, InfoCompany $infoCompany, Blog $blog)
    {
        $this->model = $model;
        $this->staff = $staff;
        $this->infoCompany = $infoCompany;
        $this->blog = $blog;
    }

    public function registerUser($inputs)
    {
        return $this->model->create([
            'name' => $inputs['username'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
        ]);
    }

    public function getListStaff()
    {
        return $this->staff->get();
    }

    public function getInfoCompany()
    {
        return $this->infoCompany->findOrFail(1);
    }

    public function getListBlogActive($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->blog->whereNull('deleted_at')
            ->where('is_active', BlogStatus::ACTIVE)
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
            ->where('is_active', BlogStatus::ACTIVE)
            ->orderByDesc('priority')->take(6)->get();
    }

    public function getBlogDetail($id)
    {
        return $this->blog->findOrFail($id);
    }
}
