<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\pages\employeeController;
use App\Http\Controllers\pages\medicalServicesController;
use App\Http\Controllers\pages\patientController;
use App\Http\Controllers\pages\positionController;
use App\Http\Controllers\pages\profileController;
use App\Http\Controllers\pages\registrationController;
use App\Models\position;
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

Route::prefix('medical-services')->middleware('auth')->group(function () {
    Route::prefix('outpatient')->group(function () {
        Route::prefix('general-clinic')->group(function () {
            Route::get('', [medicalServicesController::class, 'index'])->name('general-clinic');
            Route::post('show', [medicalServicesController::class, 'show'])->name('general-clinic.show');
        });
    });
});

Route::prefix('patient')->middleware('auth')->group(function () {
    Route::get('', [patientController::class, 'index'])->name('patient');
    Route::get('/edit/{id}', [patientController::class, 'edit'])->name('patient.edit');
});

Route::prefix('employee')->middleware('auth')->group(function () {
    Route::get('', [employeeController::class, 'index'])->name('employee');
    Route::post('', [employeeController::class, 'store'])->name('employee.add');
});
Route::prefix('position')->middleware('auth')->group(function () {
    Route::get('', [positionController::class, 'index'])->name('position');
    Route::post('', [positionController::class, 'store'])->name('position.add');
    Route::post('edit', [positionController::class, 'edit'])->name('position.edit');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
