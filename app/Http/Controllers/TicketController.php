<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Repositories\TicketRepositories;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private $ticketRepositories;

    public function __construct(TicketRepositories $ticketRepositories)
    {
        $this->ticketRepositories = $ticketRepositories;
    }

    public function index()
    {
        $tickets = $this->ticketRepositories->all();

        return response()->json($tickets);
    }

    public function show(int $id)
    {
        $ticket = Ticket::find($id);

        return response()->json($ticket);
    }

    public function store(Request $request)
    {
        $ticket = Ticket::create($request->all());

        return response()->json($ticket);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->fill($request->all());
        $ticket->save();

        return response()->json($ticket);
    }

    public function destroy(int $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();

        return response()->json($ticket);
    }
}
