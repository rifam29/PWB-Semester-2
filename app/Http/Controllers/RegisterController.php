<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRegisterRequest;
use App\Models\{
    Profile,
    User
};

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view ('auth.register');
    }

    public function store(StoreRegisterRequest $request)
    {
        $profile = new Profile;
        $profile->umur  = $request->age;
        $profile->bio  = $request->bio;
        $profile->alamat  = $request->alamat;
        $profile->save();

        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => $request->password,
            'role_id'      => 2,
            'profile_id'   => $profile->id,
        ]);
        return view('auth.login');
    }
}