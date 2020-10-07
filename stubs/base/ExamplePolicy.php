<?php

namespace App\Policies;

use App\Models\Example;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExamplePolicy extends Policy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any examples.
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
     * Determine whether the user can view the example.
     *
     * @param User    $user
     * @param Example $example
     *
     * @return bool
     */
    public function view(User $user, Example $example): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create examples.
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
     * Determine whether the user can update the example.
     *
     * @param User    $user
     * @param Example $example
     *
     * @return bool
     */
    public function update(User $user, Example $example): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the example.
     *
     * @param User    $user
     * @param Example $example
     *
     * @return bool
     */
    public function delete(User $user, Example $example): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete many examples.
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
     * Determine whether the user can restore the example.
     *
     * @param User    $user
     * @param Example $example
     *
     * @return bool
     */
    public function restore(User $user, Example $example): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the example.
     *
     * @param User    $user
     * @param Example $example
     *
     * @return bool
     */
    public function forceDelete(User $user, Example $example): bool
    {
        return false;
    }
}
