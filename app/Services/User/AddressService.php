<?php

namespace App\Services\User;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;

class AddressService extends BaseService
{
    public function __construct(Province $province, District $district, Ward $ward)
    {
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
    }

    public function getAllProvincePluck()
    {
        return $this->province->pluck('name_with_type', 'code');
    }

    public function getAllDistrictPluck()
    {
        return $this->district->pluck('name_with_type', 'code');
    }

    public function getAllWardPluck()
    {
        return $this->ward->pluck('name_with_type', 'code');
    }
}
