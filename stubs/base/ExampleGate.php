<?php

namespace App\Gates;

use App\Models\User;

class ExampleGate
{
    /**
     * Check if the user can create the model
     *
     * @param User $user
     *
     * @return bool
     */
    public function create(User $user): bool
    {
        return true;
    }
}
