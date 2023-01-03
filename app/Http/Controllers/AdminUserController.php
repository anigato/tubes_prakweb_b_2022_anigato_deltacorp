<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

 

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.userAdmin.index', [
            'title' => 'Add User Admin',
            'active' => 'adduserAdmin',
            'users' => User::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.userAdmin.add', [
            'title' => 'Add New user Admin',
            'active' => 'addNewuserAdmin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        
        User::create($validateData);

        return redirect('/admin/userAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.userAdmin.edit',[
            'title' => 'Edit User',
            'active' => 'editUser',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:3',
            'username' => ['required','min:3','max:255','unique:users'],
            'email' => 'required|unique:users|min:3',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required|same:password'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        

        User::where('id', $user->id)
            ->update($validatedData);
        return redirect('/admin/userAdmin/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        User::destroy($user->id);
        return redirect('/admin/userAdmin')->with('success','User has been deleted!');
    }
}
