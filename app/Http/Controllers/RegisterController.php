<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function indexAdmin(){
        return view('admin.register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    
    public function indexUser(){
        return view('user.register',[
            'title'=>'Register',
            'active'=>'register'
        ]);
    }

    public function storeAdmin(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        $validatedData['is_admin'] = 1 ;

        User::create($validatedData);

        return redirect('/admin/login')->with('success', 'Anda berhasi Daftar, Silahkan Login');
    }
    
    public function storeUser(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|unique:users|min:3',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required|same:password'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        
        return redirect('/login')->with('success', 'Anda berhasi Daftar, Silahkan Login');
    }
}
