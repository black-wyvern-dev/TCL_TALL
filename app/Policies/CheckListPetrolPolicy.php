<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListPetrol;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListPetrolPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the CheckListPetrol can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistpetrols');
    }

    /**
     * Determine whether the CheckListPetrol can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListPetrol  $model
     * @return mixed
     */
    public function view(User $user, CheckListPetrol $model)
    {
        return $user->hasPermissionTo('view checklistpetrols');
    }

    /**
     * Determine whether the CheckListPetrol can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistpetrols');
    }

    /**
     * Determine whether the CheckListPetrol can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListPetrol  $model
     * @return mixed
     */
    public function update(User $user, CheckListPetrol $model)
    {
        return $user->hasPermissionTo('update checklistpetrols');
    }

    /**
     * Determine whether the CheckListPetrol can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListPetrol  $model
     * @return mixed
     */
    public function delete(User $user, CheckListPetrol $model)
    {
        return $user->hasPermissionTo('delete checklistpetrols');
    }

    /**
     * Determine whether the CheckListPetrol can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListPetrol  $model
     * @return mixed
     */
    public function restore(User $user, CheckListPetrol $model)
    {
        return false;
    }

    /**
     * Determine whether the CheckListPetrol can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListPetrol  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListPetrol $model)
    {
        return false;
    }
}
