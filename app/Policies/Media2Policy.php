<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Media;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Media2Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Staff $staff)
    {

        return $staff->role = UserRole::STAFF;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Staff $staff, Media $media)
    {
        return $staff->id == $media->staff_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Media $media)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Media $media)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Media $media)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Media $media)
    {
        //
    }
}
