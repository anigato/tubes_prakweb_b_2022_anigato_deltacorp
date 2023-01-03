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
        session_start();
        return view('user.login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
        
    
    public function authenticateAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'is_admin' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
    
        return back()->with('loginError', 'Username atau Password Salah!');
    }
    
    
    public function authenticateUser(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'is_admin' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Anda Berhasil Masuk!');
        }

        return back()->with('loginError', 'Username atau Password Salah!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
