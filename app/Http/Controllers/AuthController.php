<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('username', 'email', 'password', 'role')->get();
        return view('auth.login', compact('users'));
    }
    public function create()
    {
        return view('auth.register');
    }

    public function store(StoreAuthRequest $request, User $user)
    {
        $user->create($request->all());
        return redirect()->route('auth.index')->with(['success' => 'Data '.$request['email'].' berhasil disimpan']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthRequest $request, Auth $auth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auth $auth)
    {
        //
    }
}
