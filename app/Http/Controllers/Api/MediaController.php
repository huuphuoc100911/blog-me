<?php

namespace App\Http\Controllers\Api;

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
}
