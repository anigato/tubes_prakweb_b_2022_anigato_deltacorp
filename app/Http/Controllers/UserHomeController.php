<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function homeUser()
    {
        return view('user.home',[
            'title' => 'Home User',
            'active' => 'home'
        ]);
    }
}
