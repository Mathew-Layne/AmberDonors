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

// DONOR FORM
// Route::get('/d_form', function () {
//     return view('Donor_Form');
// });

Route::get('/d_home', function () {
    return view('Donor_form');
});

Route::get('d_form', [DonorController::class, 'donate_submit']);
Route::post('store-form', [DonorController::class, 'store']);
