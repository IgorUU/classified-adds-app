<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the authenticated user can update the target user.
     */

    public function update(User $authUser, User $targetUser): bool
    {
        return $authUser->id === $targetUser->id || $authUser->isAdmin();
    }

    /**
     * Determine whether the authenticated user can delete the target user.
     *
     * The current default is that only admins can delete users.
     */
    public function delete(User $authUser, User $targetUser): bool
    {
        return $authUser->isAdmin();
    }
}
