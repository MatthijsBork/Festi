<?php

namespace App\Policies;

use App\Models\HouseResponse;
use App\Models\User;

class HouseResponsePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hasResponse(User $user, HouseResponse $house_response)
    {
        return $house_response->user->id == $user->id || $house_response->house->user->id == $user->id;
    }
}
