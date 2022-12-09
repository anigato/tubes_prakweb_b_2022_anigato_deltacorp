<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboardAdmin()
    {
        return view('admin.dashboard.index', [
            'title' => 'Dashboard Admin',
            'active' => 'dashboard'
        ]);
    }
}
