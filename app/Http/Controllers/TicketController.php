<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();

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
