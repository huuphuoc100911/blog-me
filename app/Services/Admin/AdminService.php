<?php

namespace App\Services\Admin;

use App\Enums\AccountStatus;
use App\Enums\UserRole;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::beginTransaction();

        try {
            $this->user->create([
                'name' => $inputs['username'],
                'email' => $inputs['email'],
                'is_active' => AccountStatus::ACTIVE,
                'password' => bcrypt($inputs['password']),
                'role' => UserRole::ADMIN
            ]);

            $this->staff->create([
                'name' => $inputs['username'],
                'email' => $inputs['email'],
                'is_active' => AccountStatus::ACTIVE,
                'role' => UserRole::ADMIN,
                'password' => bcrypt($inputs['password']),
            ]);

            $this->model->create([
                'name' => $inputs['username'],
                'email' => $inputs['email'],
                'password' => bcrypt($inputs['password']),
            ]);

            DB::commit();
            return true;
        } catch (\Exception $e) {
            Log::error($e);

            DB::rollback();
            return false;
        }
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

    public function changeStatusStaff($staffId)
    {
        $statusStaff = $this->staff->where('id', $staffId)->first()->is_active;
        $isActiveStaff = ($statusStaff == AccountStatus::IN_ACTIVE) ? AccountStatus::ACTIVE : AccountStatus::IN_ACTIVE;

        $this->staff::where('id', $staffId)
            ->update([
                'is_active' => $isActiveStaff
            ]);

        return $this->staff->where('id', $staffId)->first();
    }

    public function countStaffLock()
    {
        return $this->staff->where('is_active', AccountStatus::IN_ACTIVE)->count();
    }
}
