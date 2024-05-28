<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function user()
    {
        if (Auth::check())
        {
        return view("dashboard.user");
        }
        return redirect()->route("auth.login")->withErrors([
        "notif"=> "Login Dulu sebelum Akses Dashboard"
    ]);
    }
    public function admin()
    {
        if (Auth::check())
        {
        return view("dashboard.user");
        }
        return redirect()->route("auth.login")->withErrors([
        "notif"=> "Login Dulu sebelum Akses Dashboard"
    ]);
    }
}
