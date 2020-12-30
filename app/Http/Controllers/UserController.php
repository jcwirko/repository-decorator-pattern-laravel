<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['cars.tickets'])->get();

        return response()->json($users);
    }

    public function show(int $id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        $user->save();

        return response()->json($user);
    }

    public function destroy(int $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json($user);
    }

    public function getWithSameFirstAndLastName()
    {
        $name = request()->get('name');

        $first = DB::table('users')
            ->where('first_name', $name);

        $users = DB::table('users')
            ->where('last_name', $name)
            ->union($first)
            ->get();

        return response()->json($users);
    }
}
