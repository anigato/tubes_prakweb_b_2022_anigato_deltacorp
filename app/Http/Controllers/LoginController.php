<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexAdmin()
    {
        return view('admin.login', [
            'title' => 'Login Admin',
            'active' => 'login'
        ]);
    }

    public function indexUser() 
    {
        return view('user.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
        
    
    public function authenticateAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
    
        return back()->with('loginError', 'Login failed');
    }
    
    
    public function authenticateUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'is_admin' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');

    }
}
