<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $users = User::orderBy('id', 'desc')->get();

        return Inertia::render('User/User', compact('users'));

    }

    public function create(Request $request)
    {
        return Inertia::render('User/UserCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        User::create($request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'password' => ['required', 'min:8'],
        ]));
  
        return to_route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario)
    {
        return Inertia::render('User/UserShow', compact('usuario'));
    }

    public function edit(User $usuario)
    {
        return Inertia::render('User/UserEdit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->name = $request->name;
        $usuario->save();

        return to_route('user.index')->with("success", "USUARIO ACTUALIZADO CON EXITO");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario)
    {
        
        $usuario->delete();

        return to_route('user.index');

    }
}
