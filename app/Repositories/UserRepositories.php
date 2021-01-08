<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepositories
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all()
    {
        return $this->model->with(['cars.tickets'])->get();
    }

    public function get(int $id)
    {
        return User::with(['cars.tickets'])->find($id);
    }

    public function save(User $user)
    {
        $user->save();

        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();

        return $user;
    }

    public function getWithSameFirstAndLastName(string $name)
    {
        $first = $this->model->where('first_name', $name);

        $users = $this->model->where('last_name', $name)
            ->union($first)
            ->get();
    }
}
