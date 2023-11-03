<?php

namespace App\Services\Customer;

use App\Enums\AccountStatus;
use App\Enums\UserRole;
use App\Models\Customer;
use App\Services\Staff\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterService extends BaseService
{
    public function __construct(Customer $model)
    {
        $this->model = $model;
    }

    public function registerCustomer($inputs)
    {
        DB::beginTransaction();

        try {
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
