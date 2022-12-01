<?php

namespace App\Services\Staff;

use App\Enums\MediaType;
use App\Models\Media;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MediaService extends BaseService
{
    use FilterTrait;

    public function __construct(Media $model)
    {
        $this->model = $model;
    }

    public function getListMedia($staffId, $filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->model
            ->where('staff_id', $staffId)
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

    public function getMedia($id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function createMedia($inputs)
    {
        $mime = $inputs['url_image']->getMimeType();
        $staffId = auth('staff')->user()->id;
        $path = Storage::put('staff/media', $inputs['url_image']);
        $mediaHasMaxPriority = $this->model->orderByDesc('priority')->first();

        $data = [
            'staff_id' => $staffId,
            'category_id' => $inputs['category_id'],
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'url_image' => $path,
            'priority' => $mediaHasMaxPriority ? $mediaHasMaxPriority->priority + 1 : 1,
            'is_active' => $inputs['is_active'],
        ];

        if (str_contains($mime, "video/")){
            $data['type'] = MediaType::VIDEO;
        } else if(str_contains($mime, "image/")){
            $data['type'] = MediaType::IMAGE;
        } else if(str_contains($mime, "audio/")){
            $data['type'] = MediaType::AUDIO;
        }

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
