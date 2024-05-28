<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(StoreAuthRequest $request)
    {
        if(Auth::attempt(['email' => $request->email,'password'=> $request->password])) {
            $request->session()->regenerate();
            return view('dashboard.user');
        }

        return back()->withErrors([
            'notif' => 'kredensial tidak valid',
        ])->onlyInput('email') ;
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login')
        ->withSuccess('Anda Telah Keluar dari sistem');
    }
}
