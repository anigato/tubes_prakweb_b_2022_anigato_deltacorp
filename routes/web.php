
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBrandController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSlidderController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserListController;
use App\Http\Controllers\CartController;

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


// home user
Route::get('/', [UserHomeController::class, 'homeUser'])->name('home');
Route::get('/about/us/', [UserHomeController::class, 'aboutUs']);


//Register Admin
Route::get('/admin/register', [RegisterController::class, 'indexAdmin'])->name('registerAdmin');
Route::post('/admin/register', [RegisterController::class, 'storeAdmin']);

// register user
Route::get('/register', [RegisterController::class, 'indexUser'])->name('registerUser');
Route::post('/register', [RegisterController::class, 'storeUser']);

// login admin
Route::get('/admin/login', [LoginController::class, 'indexAdmin'])->name('loginAdmin')->middleware('guest');
Route::post('/admin/login', [LoginController::class, 'authenticateAdmin']);

// login user
Route::get('/login', [LoginController::class, 'indexUser'])->name('loginUser')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticateUser']);
//logout
Route::post('/logout', [LoginController::class, 'logout']);

//Dashboard Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin')->middleware('auth');

// product user
Route::resource('/product', ProductController::class);

// brand
Route::resource('/admin/brand', AdminBrandController::class)->middleware('auth');

// category
Route::resource('/admin/category', AdminCategoryController::class)->middleware('auth');

// slidder
Route::resource('/admin/slidder', AdminSlidderController::class)->middleware('auth');
Route::put('/admin/slidder/{slidder}/inactive', [AdminSlidderController::class, 'inactive']);

// Product Admin
Route::resource('/admin/product', AdminProductController::class)->middleware('auth');

// add User Admin
Route::resource('/admin/userAdmin', AdminUserController::class)->middleware('auth');
Route::get('/admin/user_admin/{user}/edit',[AdminUserController::class, "edit"])->middleware('auth');


// Order Admin
Route::resource('/admin/order', AdminOrderController::class)->middleware('auth');

// user detail
Route::resource('/user', UserDetailController::class)->middleware('auth');

// wishlist
Route::resource('/wishlist', WishlistController::class)->middleware('auth');
Route::get('wishlist/add/{product}', [WishlistController::class, "store"]);
Route::get('wishlist/delete/{wishlist}', [WishlistController::class, "destroy"]);

// cart
Route::resource('/cart', CartController::class);
Route::post('/cart/checkout', [CartController::class, 'checkOut']);

//transaction
Route::resource('/transaction', TransactionController::class)->middleware('auth');
Route::get('/trans/{order}', [TransactionController::class, "show"])->middleware('auth');

// User List
Route::resource('/admin/userList', AdminUserListController::class)->middleware('auth');

//About Us
Route::get('/about/us/', [UserHomeController::class, 'aboutUs']);
Route::get('/admin/userList/{user}', [AdminUserListController::class, "show"])->middleware('auth');
