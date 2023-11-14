<?php

namespace App\Repositories\Media;

use App\Models\Media;
use App\Repositories\BaseRepository;
use App\Repositories\Media\MediaRepositoryInterface;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public function getModel()
    {
        return Media::class;
    }

    public function getMedias($limit = 10)
    {
        return $this->model->limit($limit)->get();
    }

    public function getMediaPaginate()
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model->orderByDesc('id')->paginate($limit);
    }
}