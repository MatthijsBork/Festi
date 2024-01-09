<?php

namespace App\Policies;

use App\Models\User;
use App\Models\House;

class HousePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hasHouse(User $user, House $house)
    {
        // dd($house);
        return $house->user->id == $user->id || $user->is_admin == 1;
    }
}
