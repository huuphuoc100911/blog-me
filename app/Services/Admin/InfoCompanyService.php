<?php

namespace App\Services\Admin;

use App\Models\InfoCompany;
use Illuminate\Support\Facades\Storage;

class InfoCompanyService extends BaseService
{
    public function __construct(InfoCompany $model)
    {
        $this->model = $model;
    }

    public function getInfoCompany($id)
    {
        return $this->model->where('id', $id)->first() ?? null;
    }

    public function settingInfoCompany($inputs, $id)
    {
        $infoCompany = $this->getInfoCompany($id);

        $inputs['admin_id'] = auth('admin')->user()->id;

        if (isset($inputs['url_image'])) {
            $path = Storage::put('admin', $inputs['url_image']);
            $inputs['url_image'] = $path;
            if ($infoCompany) {
                Storage::delete($infoCompany->url_image);
            }
        } else {
            if ($infoCompany) {
                $inputs['url_image'] = $infoCompany->url_image;
            }
        }

        return $this->model->updateOrCreate(
            ['id' => 1],
            $inputs
        );
    }
}
