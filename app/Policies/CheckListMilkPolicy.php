<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CheckListMilk;
use Illuminate\Auth\Access\HandlesAuthorization;

class CheckListMilkPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the CheckListMilk can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list checklistmilks');
    }

    /**
     * Determine whether the CheckListMilk can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListMilk  $model
     * @return mixed
     */
    public function view(User $user, CheckListMilk $model)
    {
        return $user->hasPermissionTo('view checklistmilks');
    }

    /**
     * Determine whether the CheckListMilk can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create checklistmilks');
    }

    /**
     * Determine whether the CheckListMilk can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListMilk  $model
     * @return mixed
     */
    public function update(User $user, CheckListMilk $model)
    {
        return $user->hasPermissionTo('update checklistmilks');
    }

    /**
     * Determine whether the CheckListMilk can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListMilk  $model
     * @return mixed
     */
    public function delete(User $user, CheckListMilk $model)
    {
        return $user->hasPermissionTo('delete checklistmilks');
    }

    /**
     * Determine whether the CheckListMilk can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListMilk  $model
     * @return mixed
     */
    public function restore(User $user, CheckListMilk $model)
    {
        return false;
    }

    /**
     * Determine whether the CheckListMilk can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\CheckListMilk  $model
     * @return mixed
     */
    public function forceDelete(User $user, CheckListMilk $model)
    {
        return false;
    }
}
