<?php

namespace App\Policies;

use App\Models\Label;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LabelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('label_access');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Label $label)
    {
        return $user->hasPermission('label_show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('label_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Label $label)
    {
        return $user->hasPermission('label_edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Label $label)
    {
        return $user->hasPermission('label_delete');
    }

    public function deleteAny(User $user)
    {
        return $user->hasPermission('label_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Label $label)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Label  $label
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Label $label)
    {
        //
    }
}

