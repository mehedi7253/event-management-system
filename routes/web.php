<?php

use App\Http\Controllers\Admin\AdminchatController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AssignStakeholderControleerr;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ManageuserController;
use App\Http\Controllers\Admin\StackeholderController;
use App\Http\Controllers\Admin\NewOrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StakholderPaymentController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Page\ContactusPageCOntroller;
use App\Http\Controllers\Page\EventcheckController;
use App\Http\Controllers\Page\FinalorderController;
use App\Http\Controllers\Page\OrderController;
use App\Http\Controllers\Page\PagePackageController;
use App\Http\Controllers\Page\PageeventController;
use App\Http\Controllers\Page\StakeHoldersController;
use App\Http\Controllers\Stack\PaymentController;
use App\Http\Controllers\stack\StackchatController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Stack\StackController;
use App\Http\Controllers\Stack\ViewOrderController;
use App\Http\Controllers\User\RateController;
use App\Http\Controllers\User\UserchatController;
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
    Route::resource('manage-users', ManageuserController::class);
    Route::get('reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::get('reports/search', [ReportController::class, 'search'])->name('reports.search');
    Route::get('reports/payment', [ReportController::class, 'stakeholderpayment'])->name('report.cost');
    Route::get('cost/search', [ReportController::class, 'costsearch'])->name('cost.search');
    Route::resource('contact', ContactController::class);
});
//user
Route::group(['prefix' => 'user','middleware' => ['user', 'auth']], function (){
    Route::get('index', [UserController::class, 'index'])->name('user.index');
    Route::get('profile-update', [UserController::class, 'edit'])->name('user.profile-update');
    Route::PUT('update',[UserController::class,'update'])->name('user.profile.update');
    Route::get('change-password', [UserController::class, 'changePass'])->name('user.changepass');
    Route::post('change-password', [UserController::class, 'store'])->name('user.password.store');

    Route::resource('user-orders', UserOrderController::class);
    Route::resource('rating', RateController::class);
    Route::resource('user-chat', UserchatController::class);
});

//stakeholder
Route::group(['prefix' => 'stakeholder','middleware' => ['stakeholder', 'auth']], function (){
    Route::get('index', [StackController::class, 'index'])->name('stakeholder.index');
    Route::get('profile-update', [StackController::class, 'edit'])->name('stack.profile-update');
    Route::PUT('update',[StackController::class,'update'])->name('stack.profile.update');
    Route::get('change-password', [StackController::class, 'changePass'])->name('stack.changepass');
    Route::post('change-password', [StackController::class, 'store'])->name('stack.password.store');

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
Route::resource('pages-events', PageeventController::class);
Route::resource('stake-holders', StakeHoldersController::class);
Route::resource('contact-us', ContactusPageCOntroller::class);
// order
Route::resource('orders', OrderController::class);