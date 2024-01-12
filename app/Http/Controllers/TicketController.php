<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Festival;
use Illuminate\Http\Request;
use Symfony\Component\Uid\Uuid;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TicketStoreRequest;

class TicketController extends Controller
{
    public function own(Request $request)
    {
        $this->authorize('isArtist', [User::class, Auth::user()]);

        $query = $request->input('query');
        $tickets = Ticket::where('user_id', 'like', Auth::user()->id)
            ->orderBy('created_at')->paginate(10);
        return view('user.tickets.index', compact('tickets'));
    }

    public function store(TicketStoreRequest $request, Festival $festival)
    {
        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id ?? null;
        $ticket->festival_id = $festival->id;
        $ticket->uuid = Uuid::v4();
        $ticket->save();

        return redirect()->route('festivals.show', compact('festival'))->with('success', 'Ingeschreven! Check je E-mail, of kijk in je account onder "Mijn tickets"');
    }
}
