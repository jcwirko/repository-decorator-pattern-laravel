<?php

namespace App\Models;

class Ticket
{
    protected $table = 'tickets';

    protected $fillable = [
        'date',
        'amount'
    ];
}
