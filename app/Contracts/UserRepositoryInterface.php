<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function getWithSameFirstAndLastName(string $name);
}
