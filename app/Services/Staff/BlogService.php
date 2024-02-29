<?php

namespace App\Services\Staff;

use App\Models\Blog;
use App\Services\BaseService as ServicesBaseService;
use App\Services\Helper\FilterTrait;
use App\Services\Staff\BaseService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BlogService extends ServicesBaseService
{
    use FilterTrait;

    // public function __construct(Blog $model)
    // {
    //     $this->model = $model;
    // }

    public function getModel()
    {
        return Blog::class;
    }

    public function getListBlogs($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
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

    public function getBlog($blogId)
    {
        return $this->find($blogId);
    }

    public function blogCreate($inputs)
    {
        $path = Storage::put('staff/blog', $inputs['url_image']);
        $blogHasMaxPriority = $this->model->orderByDesc('id')->first();

        $data = [
            'category_id' => $inputs['category_id'],
            'title' => $inputs['title'],
            'staff_id' => auth('staff')->user()->id,
            'description' => $inputs['description'],
            'content' => $inputs['content'],
            'url_image' => $path,
            'priority' => $blogHasMaxPriority ? $blogHasMaxPriority->priority + 1 : 1,
            'is_active' => $inputs['is_active'],
        ];

        return $this->model->create($data);
    }

    public function blogUpdate($inputs, $blog)
    {
        $data = [
            'category_id' => $inputs['category_id'],
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'content' => $inputs['content'],
            'is_active' => $inputs['is_active'],
        ];

        if (isset($inputs['url_image'])) {
            $path = Storage::put('staff/blog', $inputs['url_image']);
            $data['url_image'] = $path;
            Storage::delete($blog->url_image);
        }

        return $blog->update($data);
    }

    public function blogDelete($blog)
    {
        Storage::delete($blog->url_image);

        return $blog->update([
            'deleted_at' => Carbon::now()
        ]);
    }
}