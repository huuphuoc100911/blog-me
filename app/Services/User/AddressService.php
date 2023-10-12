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
        $districts = $this->district->get();
        $arrayDistrict = [];
        foreach ($districts as $value) {
            $arrayDistrict += [
                $value->code => [
                    'name_with_type' => $value->name_with_type,
                    'parent_code' => $value->parent_code
                ]
            ];
        }

        return $arrayDistrict;
    }

    public function getAllWardPluck()
    {
        $wards = $this->ward->get();
        $arrayWard = [];
        foreach ($wards as $value) {
            $arrayWard += [
                $value->code => [
                    'name_with_type' => $value->name_with_type,
                    'parent_code' => $value->parent_code
                ]
            ];
        }

        return $arrayWard;
    }
}
