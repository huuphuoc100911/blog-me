<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InfoCompanyResource;
use App\Http\Resources\StaffResource;
use App\Services\Api\ApiService;

class ApiController extends Controller
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
}
