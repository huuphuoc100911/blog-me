<?php

namespace App\Services\Admin;

use App\Models\Admin;

class AdminService extends BaseService
{
    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function registerAdmin($inputs)
    {
        return $this->model->create([
            'name' => $inputs['username'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
        ]);
    }
}
