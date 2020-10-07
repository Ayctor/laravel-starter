<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any users.
     *
     * @param User $user
     *
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param User $user
     * @param User $model
     *
     * @return bool
     */
    public function view(User $user, User $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create users.
     *
     * @param User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param User $user
     * @param User $model
     *
     * @return bool
     */
    public function update(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param User $user
     * @param User $model
     *
     * @return bool
     */
    public function delete(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete many users.
     *
     * @param User $user
     *
     * @return bool
     */
    public function bulkDelete(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param User $user
     * @param User $model
     *
     * @return bool
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the user.
     *
     * @param User $user
     * @param User $model
     *
     * @return bool
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
