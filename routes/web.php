<?php

use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLogged;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountBooking;
use App\Http\Controllers\BusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CheckBookingController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\TravelScheduleController;
use App\Http\Controllers\UncheckedBookingController;
use App\Http\Controllers\CancelBookingController;

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

Route::middleware([CheckLogged::class])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::post('login-process', [AuthenticateController::class, 'loginProcess'])->name('login-process');
});


Route::middleware([CheckLogin::class])->group(function () {
    Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');

    // Route::get('/dashboard', function () {

    //     return view('dashboard');
    // })->name('dashboard');


    //sidebar
    Route::resource('user', UserController::class);
    Route::resource('driver', DriverController::class);
    Route::resource('bus', BusController::class);
    Route::resource('travel-schedule', TravelScheduleController::class);
    Route::resource('check-booking', CheckBookingController::class);
    Route::resource('unchecked-booking', UncheckedBookingController::class);
    Route::resource('cancel-booking', CancelBookingController::class);
    Route::resource('garage', GarageController::class);
    Route::resource('payment', PaymentController::class);
    Route::GET('statisticals-user', [StatisticalController::class, 'user'])->name('statisticals-user');
    Route::GET('statisticals-driver', [StatisticalController::class, 'driver'])->name('statisticals-driver');
    Route::GET('statisticals-garage', [StatisticalController::class, 'garage'])->name('statisticals-garage');
    Route::GET('statisticals-revenue', [StatisticalController::class, 'revenue'])->name('statisticals-revenue');
    Route::GET('count', [CountBooking::class, 'count'])->name('count');

    //search
    Route::GET('search', [SearchController::class, 'search'])->name('search');

    //profile
    Route::GET('profile-admin', [ProfileAdminController::class, 'editProfile'])->name('profile');
    Route::POST('profile-admin-update', [ProfileAdminController::class, 'updateProfile'])->name('profile-update');

    //change-password
    Route::GET('edit-password', [ProfileAdminController::class, 'editPass'])->name('editPass');
    Route::POST('edit-password', [ProfileAdminController::class, 'updatePass'])->name('updatePass');
});
//forgot pass
Route::GET('forgot-password', [ProfileAdminController::class, 'forgotPass'])->name('forgotPass');
Route::POST('forgot-password', [ProfileAdminController::class, 'postForgotPass'])->name('postforgotPass');
Route::GET('get-password', [ProfileAdminController::class, 'getPass'])->name('getPass');
Route::POST('get-password', [ProfileAdminController::class, 'postGetPass'])->name('postGetPass');
