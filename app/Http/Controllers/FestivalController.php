<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FestivalStoreRequest;
use App\Http\Requests\FestivalUpdateRequest;

class FestivalController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $festivals = Festival::where('name', 'like', "%$query%")
            ->orWhere('location', 'like', "%$query%")
            ->orderBy('name')->paginate(10);
        return view('guest.festivals.index', compact('festivals'));
    }

    public function own(Request $request)
    {
        $this->authorize('isOrganizer', [User::class, Auth::user()]);

        $query = $request->input('query');
        $festivals = Festival::where('user_id', 'like', Auth::user()->id)
            ->where('name', 'like', "%$query%")
            ->orderBy('name')->paginate(10);
        return view('user.festivals.index', compact('festivals'));
    }

    public function dashboard(Request $request)
    {
        $query = $request->input('query');
        $festivals = Festival::where('location', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->orderBy('name')->paginate(10);
        return view('dashboard.festivals.index', compact('festivals'));
    }

    public function create(Request $request)
    {
        if ($request->routeIs('dashboard.festivals.create')) {
            $organizers = User::getByRoleName('Organisator');
            return view('dashboard.festivals.create', compact('organizers'));
        }

        return view('user.festivals.create');
    }

    public function store(FestivalStoreRequest $request)
    {
        $festival = new Festival();
        $festival->name = $request->name;
        $festival->email = $request->email;
        $festival->location = $request->location;
        $festival->date = $request->date;
        $festival->description = $request->description;
        $festival->user_id = Auth::user()->id;
        // $festival->user_id = Auth::id(); -> Dit is net iets korter
        $festival->save();

        if ($request->routeIs('dashboard.festivals.create')) {
            $organizers = User::getByRoleName('Organisator');
            return redirect()->route('dashboard.festivals.info', compact('festival'))->with('success', 'Festival opgeslagen');
        }

        return redirect()->route('user.festivals.info', compact('festival'))->with('success', 'Festival opgeslagen');
    }

    public function show(Festival $festival)
    {
        return view('guest.festivals.show', compact('festival'));
    }

    public function info(Request $request, Festival $festival)
    {
        $this->authorize('hasFestival', [Festival::class, $festival]);

        if ($request->routeIs('dashboard.festivals*')) {
            return view('dashboard.festivals.info', compact('festival'));
        }

        return view('user.festivals.info', compact('festival'));
    }

    public function images(Request $request, Festival $festival)
    {
        $this->authorize('hasFestival', [Festival::class, $festival]);

        $festival_images = $festival->images()->get();

        if ($request->routeIs('dashboard.festivals*')) {
            $organizers = User::getByRoleName('Organisator');
            return view('dashboard.festivals.images', compact('festival', 'festival_images'));
        }

        return view('user.festivals.images', compact('festival', 'festival_images'));
    }

    public function bookings(Festival $festival)
    {
        $this->authorize('hasFestival', [Festival::class, $festival]);

        $bookings = $festival->bookings()->paginate(10);

        $bookedArtists = $festival->bookings()->pluck('user_id')->toArray();
        $artists =  User::getByRoleName('Artiest')->whereNotIn('id', $bookedArtists);

        return view('user.festivals.bookings', compact('festival', 'bookings', 'artists'));
    }

    public function edit(Request $request, Festival $festival)
    {
        $this->authorize('hasFestival', [Festival::class, $festival]);

        if ($request->routeIs('dashboard.festivals*')) {
            $organizers = User::getByRoleName('Organisator');
            return view('dashboard.festivals.edit', compact('festival'));
        }

        return view('user.festivals.edit', compact('festival'));
    }

    public function update(FestivalUpdateRequest $request, Festival $festival)
    {
        $festival->name = $request->name;
        $festival->email = $request->email;
        $festival->location = $request->location;
        $festival->date = $request->date;
        $festival->description = $request->description;
        $festival->user_id = Auth::user()->id;
        $festival->save();

        if ($request->routeIs('dashboard.festivals*')) {
            return redirect()->route('dashboard.festivals.info', compact('festival'))->with('success', 'Festival opgeslagen');
        }

        return redirect()->route('user.festivals.info', compact('festival'))->with('success', 'Festival opgeslagen');
    }
}
