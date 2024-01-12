<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isOrganizer(User $user)
    {
        return $user->role->name == 'Organisator' || $user->is_admin == 1;
    }

    public function isArtist(User $user)
    {
        return $user->role->name == 'Artist' || $user->is_admin == 1;
    }
}
