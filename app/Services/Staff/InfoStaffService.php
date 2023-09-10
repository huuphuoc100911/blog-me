<?php

namespace App\Services\Staff;

use App\Models\InfoStaff;
use App\Models\Staff;
use Illuminate\Support\Facades\Storage;

class InfoStaffService extends BaseService
{
    public function __construct(InfoStaff $model, Staff $staff)
    {
        $this->model = $model;
        $this->staff = $staff;
    }

    public function getInfoStaff($staffId)
    {
        return $this->model->where('staff_id', $staffId)->first();
    }

    public function getStaff($staffId)
    {
        return $this->staff->where('id', $staffId)->first();
    }

    public function settingInfoStaff($inputs, $id)
    {
        $infoStaff = $this->getInfoStaff($id);
        $this->staff->where('id', $id)->update(['name' => $inputs['name']]);

        $inputs['staff_id'] = auth('staff')->user()->id;

        if (isset($inputs['url_image'])) {
            $path = Storage::put('staff', $inputs['url_image']);
            $inputs['url_image'] = $path;
            if ($infoStaff) {
                Storage::delete($infoStaff->url_image);
            }
        } else {
            if ($infoStaff) {
                $inputs['url_image'] = $infoStaff->url_image;
            }
        }

        return $this->model->updateOrCreate(
            ['staff_id' => $id],
            $inputs
        );
    }
}