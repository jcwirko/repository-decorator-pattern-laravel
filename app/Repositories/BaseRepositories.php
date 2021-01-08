<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BaseRepositories
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->get();
    }

    public function get(int $id, array $relations = [])
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

        return $this->model->where('last_name', $name)
            ->union($first)
            ->get();
    }
}
