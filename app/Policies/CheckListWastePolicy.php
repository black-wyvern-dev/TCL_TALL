<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListWaste;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListWastePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the CheckListWaste can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistwastes');
    }

    /**
     * Determine whether the CheckListWaste can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListWaste  $model
     * @return mixed
     */
    public function view(User $user, CheckListWaste $model)
    {
        return $user->hasPermissionTo('view checklistwastes');
    }

    /**
     * Determine whether the CheckListWaste can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistwastes');
    }

    /**
     * Determine whether the CheckListWaste can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListWaste  $model
     * @return mixed
     */
    public function update(User $user, CheckListWaste $model)
    {
        return $user->hasPermissionTo('update checklistwastes');
    }

    /**
     * Determine whether the CheckListWaste can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListWaste  $model
     * @return mixed
     */
    public function delete(User $user, CheckListWaste $model)
    {
        return $user->hasPermissionTo('delete checklistwastes');
    }

    /**
     * Determine whether the CheckListWaste can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListWaste  $model
     * @return mixed
     */
    public function restore(User $user, CheckListWaste $model)
    {
        return false;
    }

    /**
     * Determine whether the CheckListWaste can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListWaste  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListWaste $model)
    {
        return false;
    }
}
