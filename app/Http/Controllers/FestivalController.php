<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Festival;
use Illuminate\Http\Request;

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
}
