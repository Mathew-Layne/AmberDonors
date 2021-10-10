<?php

use App\Http\Controllers\DonorController;
use App\Http\Controllers\PatientController;
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
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';

Route::get('dashboard/donor', [DonorController::class, 'index']);

Route::get('register/donor', [DonorController::class, 'register']);


Route::get('dashboard/patient', [PatientController::class, 'index']);

Route::get('register/patient', [PatientController::class, 'register']);