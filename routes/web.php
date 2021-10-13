<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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
});

Route::view('/dashboard', 'dashboard')
->name('dashboard')
->middleware('dashboardredirect');

require __DIR__.'/auth.php';




Route::group(['middleware'=>'auth'], function(){

    
    /* \\\\\\\\\\\\\\\\\\\\\\\\\ADMIN SECCSION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    Route::get('dashboard/admin', [AdminController::class, 'index'])->middleware('admin');
    Route::get('dashboard/admin/donor', [AdminController::class, 'donor'])->middleware('admin');
    Route::get('dashboard/admin/recipient', [AdminController::class, 'recipient'])->middleware('admin');
    Route::get('dashboard/admin/donations', [AdminController::class, 'donations'])->middleware('admin');
    Route::get('dashboard/admin/blood_request', [AdminController::class, 'blood_request'])->middleware('admin');
    Route::get('dashboard/admin/request_history', [AdminController::class, 'request_history'])->middleware('admin');

    /* \\\\\\\\\\\\\\\\\\\\\\\\\DONOR SECCSION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    Route::get('donor/register', [DonorController::class, 'register']);
    Route::post('donor/register', [DonorController::class, 'store']);

    Route::get('dashboard/donor', [DonorController::class, 'index'])->middleware('donor');

    Route::get('dashboard/donor/donate/blood', [DonorController::class, 'getBlood'])->middleware('donor');
    Route::post('dashboard/donor/donate/blood', [DonorController::class, 'storeBlood'])->middleware('donor');

    Route::get('/dashboard/donor/donation/history', [DonorController::class, 'donationHistory'])->middleware('donor');

    Route::get('dashboard/donor/delete/{id}', [DonorController::class, 'destroyDonor'])->middleware('donor');
    Route::get('dashboard/donor/edit/{id}', [DonorController::class, 'editDornor'])->middleware('donor');

    /* \\\\\\\\\\\\\\\\\\\\\\\\\RECIPIENT SECCSION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    Route::get('dashboard/recipient', [RecipientController::class, 'index']);
    Route::get('register/recipient', [RecipientController::class, 'register']);
    Route::post('register/recipient', [RecipientController::class, 'store']);

});

// Route::get('dashboard/admin/test', [AdminController::class, 'test']);


Route::get('/edit/{id}', [UpdateController::class, 'update'])->name('update-profile');
Route::post('/edit', [UpdateController::class, 'onUpdate'])->name('onupdate-profile');
