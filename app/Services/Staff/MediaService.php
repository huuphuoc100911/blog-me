<?php

namespace App\Services\Staff;

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

    public function getListMedia($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->model
            ->whereNull('deleted_at')
            ->orderBy('priority');
        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']);;
        }

        if (isset($filters['search'])) {
            $query->where('title', 'like', "%{$filters['search']}%")
                ->orWhereHas('category', function ($subQuery) use ($filters) {
                    $subQuery->where('title', 'like', "%{$filters['search']}%");
                });
        }

        return $this->filterPaginate(
            $query,
            $limit,
            $filters,
            $sorts,
            $filterable,
            $select
        );
    }

    public function getListMediaCategory($categoryId, $filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        $query = $this->model
            ->where('category_id', $categoryId)
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

    public function getMedia($id)
    {
        return $this->model->findOrFail($id);
    }

    public function mediaCreate($inputs)
    {
        $path = Storage::put('admin/media', $inputs['url_image']);
        $mediaHasMaxPriority = $this->model->orderByDesc('id')->first();

        $data = [
            'category_id' => $inputs['category_id'],
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'url_image' => $path,
            'priority' => $mediaHasMaxPriority ? $mediaHasMaxPriority->priority + 1 : 1,
            'is_active' => $inputs['is_active'],
        ];

        return $this->model->create($data);
    }

    public function mediaUpdate($inputs, $mediaId)
    {
        $media = Media::whereId($mediaId)->first();

        $data = [
            'category_id' => $inputs['category_id'],
            'title' => $inputs['title'],
            'description' => $inputs['description'],
            'is_active' => $inputs['is_active'],
        ];

        if (isset($inputs['url_image'])) {
            $path = Storage::put('admin/media', $inputs['url_image']);
            $data['url_image'] = $path;
            Storage::delete($media->url_image);
        }

        return $media->update($data);
    }

    public function deleteMedia($mediaId)
    {
        $media = Media::whereId($mediaId)->first();

        Storage::delete($media->url_image);

        return $media->update([
            'deleted_at' => Carbon::now()
        ]);
    }
}
