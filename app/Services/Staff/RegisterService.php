<?php

namespace App\Services\Staff;

use App\Enums\AccountStatus;
use App\Enums\UserRole;
use App\Models\Staff;
use App\Models\User;
use App\Services\Staff\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterService extends BaseService
{
    public function __construct(Staff $model, User $user)
    {
        $this->model = $model;
        $this->user = $user;
    }

    public function registerStaff($inputs)
    {
        DB::beginTransaction();

        try {
            $this->user->create([
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'is_active' => AccountStatus::ACTIVE,
                'password' => bcrypt($inputs['password']),
                'role' => UserRole::STAFF
            ]);

            $this->model->create([
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'is_active' => AccountStatus::IN_ACTIVE,
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
}
