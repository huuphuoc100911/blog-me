<?php

namespace App\Services\Staff;

use App\Models\Media;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
            ->whereNull('deleted_at');

        if (isset($filters['category'])) {
            $query->where('category_id', $filters['category']);;
        }

        if (isset($filters['search'])) {
            $query->where('title', 'like', "%{$filters['search']}%")
                ->orWhere('description', 'like', "%{$filters['search']}%")
                ->orWhereHas('category', function ($subQuery) use ($filters) {
                    $subQuery->where('title', 'like', "%{$filters['search']}%");
                });
        }

        // $sortType = $filters['sort_type'] ?? 'asc';

        if (isset($filters['sort_type']) && isset($filters['sort_by'])) {
            $query->orderBy($filters['sort_by'], $filters['sort_type']);
        }

        $query->orderByDesc('updated_at');

        return $query->paginate($limit)->withQueryString();

        // return $this->filterPaginate(
        //     $query,
        //     $limit,
        //     $filters,
        //     $sorts,
        //     $filterable,
        //     $select
        // );
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
            'staff_id' => Auth::guard('staff')->user()->id,
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

        if (isset($inputs['video_url'])) {
            $path = Storage::put('video', $inputs['video_url']);
            $data['video_url'] = $path;
            Storage::delete($media->video_url);
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
