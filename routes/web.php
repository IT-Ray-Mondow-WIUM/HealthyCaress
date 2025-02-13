<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\pages\profileController;
use App\Http\Controllers\pages\registrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('', [profileController::class, 'index'])->name('profile');
});

Route::prefix('registration')->middleware('auth')->group(function () {
    Route::get('', [registrationController::class, 'index'])->name('registration');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
