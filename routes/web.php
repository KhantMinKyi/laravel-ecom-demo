<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\PageController;
use App\Models\Admin;

use Illuminate\Support\Facades\Route;

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

Route::get('/aaa',function(){
    $user = Admin::find(1);
    auth('admin')->login($user);
});
Route::get('/logout',function(){
    auth('admin')->logout();
    return redirect('/');
});

// User
Route::get('/',[PageController::class,'index']);
Route::get('/item/detail/{id}',[PageController::class,'detail']);
Route::get('/products',[PageController::class,'products']);

// login
Route::get('/login',[AdminController::class,'showLogin'])->name('admin.showLogin');
Route::post('/login',[AdminController::class,'login'])->name('admin.login');

// Admin
Route::group(['middleware'=>['admin']], function(){
    Route::resource('admin',AdminController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('item',ItemController::class);
});
