<?php

namespace App\Policies;

use App\Models\User;

class FotkyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }
    public function update(User $user)
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user)
    {
        return $user->hasRole('admin');
    }
}
