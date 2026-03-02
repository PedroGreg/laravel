<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (!$users) {
            return response()->json(['message' => 'O usuario nao existe'], 404);
        }
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'O usuario nao existe'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // return response()->json(['message' => 'teste']);
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'O usuario nao exite'], 404);
        }
        $data = $request->all();

        if ($request->filled('password')) {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset( $data['password']);
        }
        $user->update($data);
        return response()->json($user, 200);
    }
}
