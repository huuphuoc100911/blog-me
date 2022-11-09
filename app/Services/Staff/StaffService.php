<?php

namespace App\Services\Staff;

use App\Models\Staff;
use App\Services\Staff\BaseService;

class StaffService extends BaseService
{
    public function __construct(Staff $model)
    {
        $this->model = $model;
    }

    public function checkStaffActive($email)
    {
        return $this->model->where('email', $email)->first()->is_active;
    }
}
