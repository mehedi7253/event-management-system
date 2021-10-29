<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Page\OrderController;
use App\Http\Controllers\Page\PagePackageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Stack\StackController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::group(['prefix' => 'admin','middleware' => ['admin', 'auth']], function (){
    Route::get('index', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('packages', PackageController::class);
    Route::resource('categorys', CategoryController::class);
    Route::resource('sub-categorys', SubcategoryController::class);
});

//user
Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
});

//stakeholder
Route::group(['prefix' => 'stakeholder','middleware' => ['stakeholder', 'auth']], function (){
    Route::get('index', [StackController::class, 'index'])->name('stakeholder.index');
});

// pages

Route::get('/package/index', [PagePackageController::class, 'index'])->name('pages.package.index');
Route::get('/package/{name}', [PagePackageController::class, 'show'])->name('pages.package.show');
Route::post('package/AddToCart', [PagePackageController::class, 'AddToCart'])->name('pages.package.AddToCart');

// order
Route::resource('orders', OrderController::class);