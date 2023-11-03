<?php

namespace App\Policies;

use App\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

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

    public function add($account = null)
    {
        $account = Auth::guard('staff')->user();

        if ($account) {
            return true;
        }
    }

    public function edit($account = null, $mediaId)
    {
        $account = Auth::guard('staff')->user();
        $media = Media::find($mediaId);

        if ($account->id == $media->staff_id) {
            return true;
        }
    }

    public function delete($account = null, $mediaId)
    {
        $account = Auth::guard('staff')->user();
        $media = Media::find($mediaId);

        if ($account->id == $media->staff_id) {
            return true;
        }
    }
}
