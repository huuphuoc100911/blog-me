<?php

namespace App\Services\User;

use App\Models\InfoCompany;
use App\Models\Staff;
use App\Services\Helper\FilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserService extends BaseService
{
    use FilterTrait;

    public function __construct(Staff $model, InfoCompany $infoCompany)
    {
        $this->model = $model;
        $this->infoCompany = $infoCompany;
    }

    public function getListStaff()
    {
        return $this->model->get();
    }

    public function getInfoCompany()
    {
        return $this->infoCompany->findOrFail(1);
    }
}
