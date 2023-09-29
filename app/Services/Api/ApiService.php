<?php

namespace App\Services\Api;

use App\Models\InfoCompany;
use App\Models\Staff;
use App\Services\Helper\FilterTrait;

class ApiService extends BaseService
{
    use FilterTrait;

    public function __construct(Staff $model, InfoCompany $infoCompany)
    {
        $this->model = $model;
        $this->infoCompany = $infoCompany;
    }

    public function getListStaff($filters = [], $sorts = [], $relations = [], $limit = 20, $select = ['*'], $filterable = [])
    {
        $limit = $limit ?? config('common.default_per_page');

        return $this->model
            ->isActive()
            ->isStaff()
            ->with('infoStaff')->get();
    }

    public function getInfoCompany()
    {
        return $this->infoCompany->get();
    }
}
