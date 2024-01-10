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
            $organizers = User::organizers();
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

        return redirect()->route('dashboard.festivals.info', compact('festival'))->with('success', 'Festival opgeslagen');
    }

    public function show(Festival $festival)
    {
        return view('guest.festivals.show', compact('festival'));
    }

    public function info(Festival $festival)
    {
        $this->authorize('hasFestival', [Festival::class, $festival]);

        return view('dashboard.festivals.info', compact('festival'));
    }

    public function edit(Festival $festival)
    {
        $this->authorize('hasFestival', [Festival::class, $festival]);

        return view('dashboard.festivals.edit', compact('festival'));
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

        return redirect()->route('dashboard.festivals.info', compact('festival'))->with('success', 'Huis opgeslagen');
    }
}
