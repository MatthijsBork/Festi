<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;

class BookingPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function hasBooking(User $user, Booking $booking)
    {
        return ($booking->user->id ?? null) == $user->id || $user->is_admin == 1;
    }
}
