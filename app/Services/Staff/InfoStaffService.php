<?php

namespace App\Services\Staff;

use App\Models\InfoStaff;
use Illuminate\Support\Facades\Storage;

class InfoStaffService extends BaseService
{
    public function __construct(InfoStaff $model)
    {
        $this->model = $model;
    }

    public function getInfoStaff($staffId)
    {
        return $this->model->where('staff_id', $staffId)->first();
    }

    public function settingInfoStaff($inputs, $id)
    {
        $infoStaff = $this->getInfoStaff($id);

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

        return $this->model->updateOrCreate(['staff_id' => $id],
            $inputs
        );
    }
}
