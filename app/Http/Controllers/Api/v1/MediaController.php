<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Services\Api\MediaService;

class MediaController extends BaseController
{
    public function __construct(MediaService $mediaService)
    {
        $this->mediaService = $mediaService;
    }

    public function index()
    {
        $medias = $this->mediaService->getListMedia();

        return MediaResource::collection($medias);
    }

    public function getListMediaOfCategory($catgoryId)
    {
        $listMediaCategory = $this->mediaService->getListMediaCategory($catgoryId);

        return MediaResource::collection($listMediaCategory);
    }

    public function get()
    {
        return 12331232;
    }
}
