<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListFood;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListFoodPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the CheckListFood can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistfoods');
    }

    /**
     * Determine whether the CheckListFood can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListFood  $model
     * @return mixed
     */
    public function view(User $user, CheckListFood $model)
    {
        return $user->hasPermissionTo('view checklistfoods');
    }

    /**
     * Determine whether the CheckListFood can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistfoods');
    }

    /**
     * Determine whether the CheckListFood can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListFood  $model
     * @return mixed
     */
    public function update(User $user, CheckListFood $model)
    {
        return $user->hasPermissionTo('update checklistfoods');
    }

    /**
     * Determine whether the CheckListFood can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListFood  $model
     * @return mixed
     */
    public function delete(User $user, CheckListFood $model)
    {
        return $user->hasPermissionTo('delete checklistfoods');
    }

    /**
     * Determine whether the CheckListFood can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListFood  $model
     * @return mixed
     */
    public function restore(User $user, CheckListFood $model)
    {
        return false;
    }

    /**
     * Determine whether the CheckListFood can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListFood  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListFood $model)
    {
        return false;
    }
}
