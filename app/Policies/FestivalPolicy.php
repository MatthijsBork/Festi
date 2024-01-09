<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Festival;

class FestivalPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hasFestival(User $user, Festival $festival)
    {
        return $festival->user->id == $user->id || $user->is_admin == 1;
    }
}
