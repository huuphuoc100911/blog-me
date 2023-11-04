<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function permission($account = null)
    {
        $account = Auth::guard('staff')->user();

        if (!$account) {
            return true;
        }

        return checkIsRoleIsset($account->group->permissions, 'groups', 'permission');
    }
}