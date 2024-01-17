<?php

namespace App\Policies;

use App\Http\Controllers\JedlaController;
use App\Models\Jedla;
use App\Models\User;

class JedloPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user)
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user)
    {
        return $user->hasRole('admin');
    }
}
