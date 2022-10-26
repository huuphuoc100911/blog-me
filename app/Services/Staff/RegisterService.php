<?php

namespace App\Services\Staff;

use App\Models\Staff;
use App\Services\Staff\BaseService;

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
            'password' => bcrypt($inputs['password']),
        ]);
    }
}