<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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


Route::view('/', 'home')->name('home');


// Email verification after user register new account
Route::group(['middleware' => 'auth',
              'prefix' => 'email',
              'as' => 'verification.'], function() {

        Route::view('/verify', 'auth.verify-email')->name('notice');

        Route::get('/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
            $request->fulfill();

            return redirect('/');
        })->middleware(['signed'])->name('verify');


        Route::post('/verification-notification', function (Request $request) {
            $request->user()->sendEmailVerificationNotification();

            return back()->with('message', 'Verification link sent!');
        })->middleware(['throttle:6,1'])->name('send');
});


Route::middleware(['auth', 'verified'])->group(function() {

    Route::middleware(['role:super-admin'])->group(function() {

        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('users', UserController::class);
    });

});
