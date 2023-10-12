<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Resources\InfoCompanyResource;
use App\Http\Resources\ProvinceResource;
use App\Http\Resources\StaffResource;
use App\Services\Api\ApiService;
use Illuminate\Http\Response;

class ApiController extends BaseController
{
    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getListStaff()
    {
        $listStaff = $this->apiService->getListStaff();

        return StaffResource::collection($listStaff);
    }

    public function getInfoCompany()
    {
        $infoCompany = $this->apiService->getInfoCompany();

        return InfoCompanyResource::collection($infoCompany);
    }

    public function getUserAmount()
    {
        $amountUser = $this->apiService->getUserAmount();

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $amountUser
        ]);
    }

    public function getMediaAmount()
    {
        $amountNedia = $this->apiService->getMediaAmount();

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $amountNedia
        ]);
    }

    public function getBlogAmount()
    {
        $amountBlog = $this->apiService->getBlogAmount();

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $amountBlog
        ]);
    }

    public function getPlaceVn()
    {
        $placeVn = $this->apiService->getPlaceVn();

        return ProvinceResource::collection($placeVn);
    }
}
