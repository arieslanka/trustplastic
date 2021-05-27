<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/users',[UserController::class,'index'])->middleware(['auth','permitted']);
Route::post('/users/enroll',[UserController::class,'enrollorupdate']);
Route::get('/users/get/table',[UserController::class,'get']);
Route::get('/users/find/{id}',[UserController::class,'find']);
Route::get('/users/edit/status/{id}/{status}',[UserController::class,'editStatus']);

Route::get('/permissions',[PermissionController::class,'index'])->middleware(['auth','permitted']);
Route::post('/permissions/enroll',[PermissionController::class,'enrollorupdate'])->middleware(['auth']);
Route::get('/permissions/get/table',[PermissionController::class,'get'])->middleware(['auth']);
Route::get('/permissions/edit/status/{id}/{status}',[PermissionController::class,'editStatus'])->middleware(['auth']);
Route::get('/permissions/find/{id}',[PermissionController::class,'find']);

Route::get('/vehicles',[VehicleController::class,'index'])->middleware(['auth','permitted']);
Route::post('/vehicles/enroll',[VehicleController::class,'enrollorupdate']);
Route::get('/vehicles/get/table',[VehicleController::class,'get']);
Route::get('/vehicles/find/{id}',[VehicleController::class,'find']);
Route::get('/vehicles/edit/status/{id}/{status}',[VehicleController::class,'editStatus']);
Route::get('/vehicles/next/data/{vid}',[VehicleController::class,'nextIdwithVehicleCode']);

Route::get('/products',[ProductController::class,'index'])->middleware(['auth','permitted']);
Route::get('/products/suggesions',[ProductController::class,'suggetions']);
Route::post('/products/enroll',[ProductController::class,'enrollorupdate']);
Route::get('/products/get/table',[ProductController::class,'get']);
Route::get('/products/find/{id}',[ProductController::class,'find']);
Route::get('/products/edit/status/{id}/{status}',[ProductController::class,'editStatus']);

Route::get('/home',function(){
    return view('dashboard.dashboard');
})->middleware('auth');

Route::get('/item-category',function(){
    return view('dashboard.item_category');
});

Route::get('/item',function(){
    return view('dashboard.item');
});

Route::get('/supplier',function(){
    return view('dashboard.supplier');
});

Route::get('/purchase-order',function(){
    return view('dashboard.purchase_order_requests');
});

Route::get('/test',function(){
    return view('dashboard.test');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
