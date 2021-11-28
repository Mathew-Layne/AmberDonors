<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\HospitalController;
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

    
    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ADMIN SECTION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    Route::get('dashboard/admin', [AdminController::class, 'index'])->middleware('admin');
    Route::get('dashboard/admin/donor', [AdminController::class, 'donor'])->middleware('admin');
    Route::get('dashboard/admin/recipient', [AdminController::class, 'recipient'])->middleware('admin');
    Route::get('dashboard/admin/donations', [AdminController::class, 'donations'])->middleware('admin');
    Route::get('dashboard/admin/blood_request', [AdminController::class, 'blood_request'])->middleware('admin');
    Route::get('dashboard/admin/request_history', [AdminController::class, 'request_history'])->middleware('admin');

    Route::get('/dashboard/admin/onApprove/{id}', [UpdateController::class, 'onApprove'])
    ->name('donor-approved')->middleware('admin');

    Route::get('/dashboard/admin/onReject/{id}', [UpdateController::class, 'onReject'])
    ->name('donor-rejected')->middleware('admin');

    Route::get('/dashboard/admin/approve/{id}', [UpdateController::class, 'approve'])
    ->name('recipient-approved')->middleware('admin');

    Route::get('/dashboard/admin/reject/{id}', [UpdateController::class, 'reject'])
    ->name('recipient-rejected')->middleware('admin');

    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\DONOR SECTION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    Route::get('donor/register', [DonorController::class, 'register']);
    Route::post('donor/register', [DonorController::class, 'store']);

    Route::get('dashboard/donor', [DonorController::class, 'index'])->middleware('donor');

    Route::get('dashboard/donor/donate/blood', [DonorController::class, 'getBlood'])->middleware('donor');
    Route::post('dashboard/donor/donate/blood', [DonorController::class, 'storeBlood'])->middleware('donor');

    Route::get('/dashboard/donor/donation/history', [DonorController::class, 'donationHistory'])->middleware('donor');

    Route::get('dashboard/donor/delete/{id}', [DonorController::class, 'destroyDonor'])->middleware('donor');
    Route::get('dashboard/donor/edit/{id}', [DonorController::class, 'editdonor'])->middleware('donor');
    Route::post('dashboard/donor/edit', [DonorController::class, 'updateDonor'])->name('donor-onUpdate')->middleware('donor');


    /* \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\RECIPIENT SECTION\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ */

    Route::get('dashboard/recipient', [HospitalController::class, 'index'])->name('hospitalDashboard');
    Route::get('register/recipient', [HospitalController::class, 'register']);
    Route::post('register/recipient', [HospitalController::class, 'store']);

    Route::get('dashboard/recipient/bloodRequest', [HospitalController::class, 'bloodRequest'])->name('hospitalRequest');

    Route::post('dashboard/recipient/bloodRequest', [HospitalController::class, 'storeRequest'])->name('storeRequest');

    Route::get('dashboard/recipient/pendingRequest', [HospitalController::class, 'pendingRequest'])->name('pendingRequest');
    Route::get('dashboard/recipient/requestHistory', [HospitalController::class, 'allRequests'])->name('requestHistory');


    Route::get('dashboard/recipient/delete/{id}', [UpdateController::class, 'destroyRecipient'])->middleware('recipient');
    Route::get('dashboard/recipient/edit/{id}', [UpdateController::class, 'editRecipient'])->middleware('recipient');


});






