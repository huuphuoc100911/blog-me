<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MediaPolicy
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

        return checkIsRoleIsset($account->group->permissions, 'medias', 'view');
    }

    public function add($account = null)
    {
        $account = Auth::guard('staff')->user();

        if (!$account) {
            return true;
        }

        return checkIsRoleIsset($account->group->permissions, 'medias', 'add');
    }

    public function edit($account = null, $mediaId)
    {
        $account = Auth::guard('staff')->user();

        if (!isset($account)) {
            return false;
        } else {
            $media = Media::find($mediaId);

            return ($account->id == $media->staff_id) && checkIsRoleIsset($account->group->permissions, 'medias', 'edit');
        }
    }

    public function delete($account = null, $mediaId)
    {
        $account = Auth::guard('staff')->user();

        if (!isset($account)) {
            return false;
        } else {
            $media = Media::find($mediaId);

            return ($account->id == $media->staff_id) && checkIsRoleIsset($account->group->permissions, 'medias', 'delete');
        }
    }
}