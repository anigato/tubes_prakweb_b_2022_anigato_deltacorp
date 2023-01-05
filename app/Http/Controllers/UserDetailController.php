<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use App\Http\Requests\StoreUserDetailRequest;
use App\Http\Requests\UpdateUserDetailRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
        return view('user.userDetail.detail', [
            'title' => 'User Detail',
            'active' => 'User_detail',
            'user' => $user,
            "newProducts" => Product::latest()->limit(4)->get(),
            "randomProducts" => Product::inRandomOrder()->limit(10)->get(),
            'categories' => Category::latest()->first()->limit(5)->get(),
            "brands" => Brand::all(),
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user){
        return view('user.userDetail.edit', [
            'title' => 'Detail User',
            'active' => 'Detail_user',
            'user' => $user,
            'categories' => Category::latest()->first()->limit(5)->get(),
            "brands" => Brand::all(),
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserDetailRequest  $request
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserDetailRequest $request, UserDetail $userDetail)
    {
        $dataUser = [
            'password' => 'required|min:5|max:255',
            'email' => 'required|email|unique:users'
        ];

        $dataDetaill = [
            'nick_name' => 'required|min:3',
            'full_name' => 'required|min:3',
            'phone' => 'required|min:6',
            'street' => 'required|min:3',
            'rt    ' => 'required|min:3',
            'rw' => 'required|min:3',
            'dusun' => 'required|min:3',
            'desa' => 'required|min:3',
            'kecamatan' => 'required|min:3',
            'kabupaten' => 'required|min:3',
            'provinsi' => 'required|min:3',
            'postal_code' => 'required|min:3',
            'img' => 'image|file|max:1024'
        ];

        $validDataUser = $request->validate($dataUser);
        $validDataDetaill = $request->validate($dataDetaill);

        if ($request->file('img')) {
            $img = $request->file('img')->store('img/user');
            $imageSplit = explode('/', $img);
            $validatedData['img'] = $imageSplit[2];
        }


        User::where('id', Auth()->user()->id)->update($validDataUser);
        UserDetail::where('id', $userDetail->id)->update($validDataDetaill);
        return back()->with('success','Profil anda berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        //
    }
}
