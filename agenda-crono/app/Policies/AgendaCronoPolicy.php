<?php

namespace App\Policies;

use App\Models\AgendaCrono;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgendaCronoPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AgendaCrono  $agendaCrono
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AgendaCrono $agendaCrono)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role == 'Admin';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AgendaCrono  $agendaCrono
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AgendaCrono $agendaCrono)
    {
        return $user->role == 'Admin';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AgendaCrono  $agendaCrono
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AgendaCrono $agendaCrono)
    {
        return $user->role == 'Admin';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AgendaCrono  $agendaCrono
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AgendaCrono $agendaCrono)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AgendaCrono  $agendaCrono
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AgendaCrono $agendaCrono)
    {
        //
    }
}
