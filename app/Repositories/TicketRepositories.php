<?php

namespace App\Repositories;

use App\Models\Ticket;

class TicketRepositories extends BaseRepositories
{
    public function __construct(Ticket $ticket)
    {
       parent::__construct($ticket);
    }
}
