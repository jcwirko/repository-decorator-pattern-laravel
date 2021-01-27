<?php

namespace App\Http\Controllers;

use App\Cache\UserCache;
use App\Models\User;
use App\Repositories\UserRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    private $userRepositories;

    public function __construct(UserCache $userRepositories)
    {
        $this->userRepositories = $userRepositories;
    }

    public function index()
    {
        $tiempoInicial = (microtime(true) * 1000);

        $users = $this->userRepositories->all();

        $tiempoFinal = (microtime(true) * 1000);

        $total = $tiempoFinal - $tiempoInicial;

        dump('Milisegundos: ', $total);
        dump('Segundos:', $total / 1000);

        return response()->json($users);
    }

    public function show(int $id)
    {
        $user = $this->userRepositories->get($id);

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = new User($request->all());
        $user = $this->userRepositories->save($user);

        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user = $this->userRepositories->save($user);

        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user = $this->userRepositories->delete($user);

        return response()->json($user);
    }

    public function getWithSameFirstAndLastName()
    {
        $name = request()->get('name');

        /*
         * Logica de negocio
         * ...
         * ...
         */

        $users = $this->userRepositories->getWithSameFirstAndLastName($name);

        return response()->json($users);
    }
}
