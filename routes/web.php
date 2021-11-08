<?php

use App\Http\Controllers\Admin\AdminchatController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AssignStakeholderControleerr;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\StackeholderController;
use App\Http\Controllers\Admin\NewOrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\StakholderPaymentController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Page\EventcheckController;
use App\Http\Controllers\Page\FinalorderController;
use App\Http\Controllers\Page\OrderController;
use App\Http\Controllers\Page\PagePackageController;
use App\Http\Controllers\Stack\PaymentController;
use App\Http\Controllers\stack\StackchatController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Stack\StackController;
use App\Http\Controllers\Stack\ViewOrderController;
use App\Http\Controllers\User\RateController;
use App\Http\Controllers\User\UserOrderController;
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
    Route::resource('neworders', NewOrderController::class);
    Route::resource('admin-stackholder', StackeholderController::class);
    Route::resource('assignstakeholders', AssignStakeholderControleerr::class);
    Route::resource('events', EventController::class);
    Route::resource('admin-chat', AdminchatController::class);
    Route::resource('stackeholder-payments', StakholderPaymentController::class);
});
//user
Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');

    Route::resource('user-orders', UserOrderController::class);
    Route::resource('rating', RateController::class);
});

//stakeholder
Route::group(['prefix' => 'stakeholder','middleware' => ['stakeholder', 'auth']], function (){
    Route::get('index', [StackController::class, 'index'])->name('stakeholder.index');

    Route::resource('new-orders', ViewOrderController::class);
    Route::resource('stack-chat', StackchatController::class);
    Route::resource('payment', PaymentController::class);
});

// pages

Route::get('/package/index', [PagePackageController::class, 'index'])->name('pages.package.index');
Route::get('/package/{name}', [PagePackageController::class, 'show'])->name('pages.package.show');
Route::post('package/AddToCart', [PagePackageController::class, 'AddToCart'])->name('pages.package.AddToCart');
Route::POST('/package/event', [EventcheckController::class, 'search'])->name('event.search');
Route::PUT('/package/update/{id}', [EventcheckController::class, 'update'])->name('package.event.update');
Route::resource('finalorders', FinalorderController::class);


// order
Route::resource('orders', OrderController::class);