<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookingStoreRequest;

class BookingController extends Controller
{
    public function store(BookingStoreRequest $request, Festival $festival)
    {
        $booking = new Booking();

        $booking->festival_id = $festival->id;
        $booking->user_id = $request->artist;
        $booking->save();

        if ($request->routeIs('dashboard.festivals*')) {
            return redirect()->route('dashboard.festivals.bookings')->with('success', 'Geboekt!');
        }

        return redirect()->route('user.festivals.bookings', compact('festival'))->with('success', 'Geboekt!');
    }

    public function own(Request $request)
    {
        $this->authorize('isArtist', [User::class, Auth::user()]);

        $query = $request->input('query');
        $bookings = Booking::where('user_id', 'like', Auth::user()->id)
            ->orderBy('created_at')->paginate(10);
        return view('user.bookings.index', compact('bookings'));
    }

    public function accept(Request $request, Booking $booking)
    {
        $this->authorize('hasBooking', [Booking::class, $booking]);

        $booking->status = 1;
        $booking->save();

        return redirect()->route('user.bookings')->with('success', 'Boeking geaccepteerd!');
    }

    public function reject(Request $request, Booking $booking)
    {
        $this->authorize('hasBooking', [Booking::class, $booking]);

        $booking->status = 2;
        $booking->save();

        return redirect()->route('user.bookings')->with('success', 'Boeking geweigerd!');
    }

    public function delete(Request $request, Booking $booking) {
        $this->authorize('hasBooking', [Booking::class, $booking]);

        $booking->delete();

        return redirect()->route('user.bookings')->with('success', 'Boeking verwijderd!');
    }
}
