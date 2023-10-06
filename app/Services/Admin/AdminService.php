<?php

namespace App\Services\Admin;

use App\Enums\AccountStatus;
use App\Enums\UserRole;
use App\Jobs\QueueSendEmailStaff;
use App\Models\Admin;
use App\Models\Staff;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Nexmo\Client\Credentials\Basic;
use Nexmo\Client;
use Nexmo\Client\Exception\Request as NexmoExceptionRequest;

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

    public function sendEmail()
    {
        try {
            $staffs = $this->staff->isActive()
                ->isStaff()->get();

            QueueSendEmailStaff::dispatch($staffs)->onQueue('emails');

            return true;
        } catch (Exception $e) {
            Log::error($e);

            return false;
        }
    }

    public function send($phoneNumber, $content, $from = null)
    {
        $basic = new Basic(env('NEXMO_API_KEY'), env('NEXMO_API_SECRET'));
        $client = new Client($basic);

        try {
            $client->message()->send([
                'to' => $phoneNumber,
                'from' => $from ?? env('NEXMO_FROM_SEND'),
                'text' => $content,
            ]);

            return true;
        } catch (NexmoExceptionRequest $e) {
            Log::error($e); //Nexmo error
        }

        throw new \Exception('Nexmo send sms code error', 200);
    }

    public function generateSmsCode($length = 6)
    {
        return substr(sha1(rand()), 0, $length);
    }
}
