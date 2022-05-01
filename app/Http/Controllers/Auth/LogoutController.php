<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function handle()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}