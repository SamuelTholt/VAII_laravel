<?php

namespace App\Policies;

use App\Models\Reviews;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function update(User $user, Reviews $review)
    {
        return $user->id === $review->user_id;
    }

    public function delete(User $user, Reviews $review)
    {
        return $user->id === $review->user_id;
    }
}
