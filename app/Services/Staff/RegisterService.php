<?php

namespace App\Services\Staff;

use App\Enums\AccountStatus;
use App\Models\Staff;
use App\Services\Staff\BaseService;
use Illuminate\Support\Facades\Log;

class RegisterService extends BaseService
{
    public function __construct(Staff $model)
    {
        $this->model = $model;
    }

    public function registerStaff($inputs)
    {
        return $this->model->create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'is_active' => AccountStatus::IN_ACTIVE,
            'password' => bcrypt($inputs['password']),
        ]);
    }
}
