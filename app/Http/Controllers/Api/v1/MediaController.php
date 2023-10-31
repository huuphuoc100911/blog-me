<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\Api\Admin\MediaCreateRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Services\Api\MediaService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function getListMedia()
    {
        $medias = $this->mediaService->getListMedia();

        return MediaResource::collection($medias);
    }

    public function postMedia(MediaCreateRequest $request)
    {
        $data = [
            'title' => $request->title,
            'category_id' => $request->category_id,
            'url_image' => $request->url_image,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'method' => $request->method ?? null,
            'media_id' => $request->media_id ?? null,
        ];

        return $this->mediaService->updateOrCreateMedia($data);
    }

    public function getMedia($id)
    {
        $media = $this->mediaService->getMedia($id);

        return new MediaResource($media);
    }

    public function deleteMedia($id)
    {
        $media = $this->mediaService->deleteMedia($id);

        return new MediaResource($media);
    }
}
