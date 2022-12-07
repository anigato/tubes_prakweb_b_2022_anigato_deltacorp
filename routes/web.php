<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',function (){
    
});

//Register Admin
Route::get('/admin/register', [RegisterController::class, 'indexAdmin']);
Route::post('/admin/register', [RegisterController::class, 'storeAdmin']);

// register user
Route::get('/register', [RegisterController::class, 'indexUser']);
Route::post('/register', [RegisterController::class, 'storeUser']);

