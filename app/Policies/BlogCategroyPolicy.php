<?php

namespace App\Policies;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class BlogCategroyPolicy
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

    public function view($account = null)
    {
        $account = Auth::guard('staff')->user();

        if (!$account) {
            return true;
        }

        return checkIsRoleIsset($account->group->permissions, 'blog_categories', 'view');
    }

    public function add($account = null)
    {
        $account = Auth::guard('staff')->user();

        if (!$account) {
            return true;
        }

        return checkIsRoleIsset($account->group->permissions, 'blog_categories', 'add');
    }

    public function edit($account = null, $id)
    {
        $account = Auth::guard('staff')->user();

        if (!isset($account)) {
            return false;
        } else {
            $blogCategories = BlogCategory::find($id);

            return ($account->id == $blogCategories->staff_id) && checkIsRoleIsset($account->group->permissions, 'blog_categories', 'edit');
        }
    }

    public function delete($account = null, $id)
    {
        $account = Auth::guard('staff')->user();

        if (!isset($account)) {
            return false;
        } else {
            $blogCategories = BlogCategory::find($id);

            return ($account->id == $blogCategories->staff_id) && checkIsRoleIsset($account->group->permissions, 'blog_categories', 'delete');
        }
    }
}