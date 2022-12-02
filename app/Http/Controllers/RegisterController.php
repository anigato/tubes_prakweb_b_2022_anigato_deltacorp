<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('user.register',[
            'title'=>'Register',
            'active'=>'register'
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|unique:users',
            'password' => 'required|min:6|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success','Registration Successful! Please Login');

        return redirect('/login');
        
    }
}
