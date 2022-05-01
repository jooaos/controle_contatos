<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function handle()
    {
        $success = auth()->attempt([
            'email' => request('email'),
            'password' => request('password')
        ]);
        if ($success) {
            return redirect()->to(RouteServiceProvider::HOME);
        }
        return back()->withErrors([
            'login-error' => 'Tente fazer o login novamente',
        ]);
    }
}
