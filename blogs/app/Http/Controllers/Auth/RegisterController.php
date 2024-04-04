<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if ($request->password != $request->password_confirmation) {
            return back()->withErrors([
                'password' => 'Password and password confirmation do not match',
            ]);
        }
        
        User::create(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);
        
        return redirect('/login');
    }
}
