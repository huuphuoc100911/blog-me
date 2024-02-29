<?php

namespace App\Services\Staff;

use App\Models\Media;
use App\Services\BaseService;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MediaService extends BaseService
{
    use FilterTrait;

    // public function __construct(Media $model)
    // {
    //     $this->model = $model;
    // }

    public function getModel()
    {
        return Media::class;
    }

    public function getListMedia($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');
        $test = $this->model->first();
        dd($test);

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
        return $this->find($id);
    }

    public function mediaCreate($inputs)
    {
        DB::beginTransaction();

        try {
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

            $this->create($data);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            Log::error($e);
            Storage::delete($path);

            DB::rollback();
            return false;
        }
    }

    public function mediaUpdate($inputs, $mediaId)
    {
        DB::beginTransaction();

        try {
            $media = $this->find($mediaId);

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

            $this->update($data, $mediaId);

            DB::commit();

            return true;
        } catch (\Exception $e) {
            Log::error($e);

            DB::rollback();
            return false;
        }
    }

    public function deleteMedia($mediaId)
    {
        $media = $this->find($mediaId);
        Storage::delete($media->url_image);

        return $this->delete($mediaId);
    }
}
