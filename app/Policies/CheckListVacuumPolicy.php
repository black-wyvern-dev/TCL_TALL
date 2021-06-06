<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListVacuum;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListVacuumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the CheckListVacuum can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistvacuums');
    }

    /**
     * Determine whether the CheckListVacuum can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListVacuum  $model
     * @return mixed
     */
    public function view(User $user, CheckListVacuum $model)
    {
        return $user->hasPermissionTo('view checklistvacuums');
    }

    /**
     * Determine whether the CheckListVacuum can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistvacuums');
    }

    /**
     * Determine whether the CheckListVacuum can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListVacuum  $model
     * @return mixed
     */
    public function update(User $user, CheckListVacuum $model)
    {
        return $user->hasPermissionTo('update checklistvacuums');
    }

    /**
     * Determine whether the CheckListVacuum can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListVacuum  $model
     * @return mixed
     */
    public function delete(User $user, CheckListVacuum $model)
    {
        return $user->hasPermissionTo('delete checklistvacuums');
    }

    /**
     * Determine whether the CheckListVacuum can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListVacuum  $model
     * @return mixed
     */
    public function restore(User $user, CheckListVacuum $model)
    {
        return false;
    }

    /**
     * Determine whether the CheckListVacuum can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListVacuum  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListVacuum $model)
    {
        return false;
    }
}
