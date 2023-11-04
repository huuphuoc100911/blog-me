<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BlogPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view($account = null)
    {
        $account = Auth::guard('staff')->user();

        if (!$account) {
            return true;
        }

        return checkIsRoleIsset($account->group->permissions, 'blogs', 'view');
    }

    public function add($account = null)
    {
        $account = Auth::guard('staff')->user();

        if (!$account) {
            return true;
        }

        return checkIsRoleIsset($account->group->permissions, 'blogs', 'add');
    }

    public function edit($account = null, $id)
    {
        $account = Auth::guard('staff')->user();

        if (!isset($account)) {
            return false;
        } else {
            $blog = Blog::find($id);

            return ($account->id == $blog->staff_id) && checkIsRoleIsset($account->group->permissions, 'blogs', 'edit');
        }
    }

    public function delete($account = null, $id)
    {
        $account = Auth::guard('staff')->user();

        if (!isset($account)) {
            return false;
        } else {
            $blog = Blog::find($id);

            return ($account->id == $blog->staff_id) && checkIsRoleIsset($account->group->permissions, 'blogs', 'delete');
        }
    }
}