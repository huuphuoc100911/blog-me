<?php

namespace App\Services\Admin;

use App\Enums\BlogCategoryStatus;
use App\Models\BlogCategory;
use App\Services\Helper\FilterTrait;
use Illuminate\Support\Facades\Storage;

class BlogCategoryService extends BaseService
{
    use FilterTrait;

    public function __construct(BlogCategory $model)
    {
        $this->model = $model;
    }

    public function getListBlogCategory($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->filterPaginate(
            $this->model,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }


    public function changeStatusBlogCategory($blogCategoryId)
    {
        $blogCategory = $this->model->findOrFail($blogCategoryId);

        $blogCategory->is_active = $blogCategory->is_active === BlogCategoryStatus::ACTIVE ? BlogCategoryStatus::INACTIVE : BlogCategoryStatus::ACTIVE;
        $blogCategory->save();

        return $this->model->findOrFail($blogCategoryId);
    }

    public function getListBlogCategoryPluck()
    {
        return $this->model
            ->pluck('title', 'id');
    }

    public function getBlogCategory($id)
    {
        return $this->model->findOrFail($id);
    }

    public function blogCategoryCreate($inputs)
    {
        $staffId = auth('staff')->user()->id;
        $path = Storage::put('staff/blog-category', $inputs['url_image']);

        $data = [
            'staff_id' => $staffId,
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'url_image' => $path,
            'is_active' => $inputs['is_active'],
        ];

        return $this->model->create($data);
    }

    public function blogCategoryUpdate($inputs, $blogCategory)
    {
        $data = [
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'is_active' => $inputs['is_active'],
        ];

        if (isset($inputs['url_image'])) {
            $path = Storage::put('staff/blog-category', $inputs['url_image']);
            $data['url_image'] = $path;
            Storage::delete($blogCategory->url_image);
        }

        return $blogCategory->update($data);
    }
}
