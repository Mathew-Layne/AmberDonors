<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\RecipientController;
use App\Http\Controllers\UpdateController;
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

Route::group(['middleware'=>'auth'], function(){
    
    Route::get('donor/register', [DonorController::class, 'register']);
    Route::post('donor/register', [DonorController::class, 'store']);
});


Route::get('dashboard/patient', [RecipientController::class, 'index']);
Route::get('register/patient', [RecipientController::class, 'register']);

                            // Admin Section
Route::get('dashboard/admin', [AdminController::class, 'index']);
Route::get('dashboard/admin/donor', [AdminController::class, 'donor']);
Route::get('dashboard/admin/patient', [AdminController::class, 'patient']);
Route::get('dashboard/admin/donations', [AdminController::class, 'donations']);
Route::get('dashboard/admin/blood_request', [AdminController::class, 'blood_request']);
Route::get('dashboard/admin/request_history', [AdminController::class, 'request_history']);


// Route::get('dashboard/admin/test', [AdminController::class, 'test']);


Route::get('/edit/{id}', [UpdateController::class, 'update'])->name('update-profile');
Route::post('/edit', [UpdateController::class, 'onUpdate'])->name('onupdate-profile');
