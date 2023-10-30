<?php

namespace App\Services\Api;

use App\Models\Media;
use App\Services\Helper\FilterTrait;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
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
        $limit = config('common.default_per_page');

        $query = $this->model
            ->whereNull('deleted_at')->with('category')
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

    public function getListMediaCategory($categoryId, $filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = config('common.default_per_page');

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

    public function updateOrCreateMedia($inputs)
    {
        try {
            $path = Storage::put('admin/media', $inputs['url_image']);
            $mediaHasMaxPriority = $this->model->orderByDesc('id')->first();

            $data = [
                'category_id' => $inputs['category'],
                'title' => $inputs['title'],
                'description' => $inputs['description'],
                'url_image' => $path,
                'priority' => $mediaHasMaxPriority ? $mediaHasMaxPriority->priority + 1 : 1,
                'is_active' => $inputs['status'],
            ];

            $this->model->create($data);

            return [
                'status' => Response::HTTP_OK,
            ];
        } catch (Exception $e) {
            Log::error($e);

            return [
                'status' => Response::HTTP_FORBIDDEN,
            ];
        }
    }
}
