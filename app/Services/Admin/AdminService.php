<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Models\Staff;
use App\Models\User;

class AdminService extends BaseService
{
    public function __construct(Admin $model, Staff $staff, User $user)
    {
        $this->model = $model;
        $this->staff = $staff;
        $this->user = $user;
    }

    public function registerAdmin($inputs)
    {
        return $this->model->create([
            'name' => $inputs['username'],
            'email' => $inputs['email'],
            'password' => bcrypt($inputs['password']),
        ]);
    }

    public function getListAdmin()
    {
        return $this->model->get();
    }

    public function getListStaff()
    {
        return $this->staff->get();
    }

    public function getListUser()
    {
        return $this->user->get();
    }
}
