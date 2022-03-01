<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\CauseController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Website\UserController;
// use App\Http\Controllers\Admin\UserController as AdminUserController;

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
    return view('admin.master');
});

// Cause
Route::get('/cause',[CauseController::class,'cause'])->name('cause');
Route::get('/create/cause',[CauseController::class,'createCause'])->name('create.cause');
Route::post('/store/cause',[CauseController::class,'storeCause'])->name('store.cause');
// cause view,update,delete
Route::get('/view/cause/{cause_id}',[CauseController::class,'viewCause'])->name('view.cause');
Route::get('/edit/cause/{cause_id}',[CauseController::class,'editCause'])->name('edit.cause');
Route::put('/update/cause/{cause_id}',[CauseController::class,'updateCause'])->name('update.cause');
Route::get('/delete/cause/{cause_id}',[CauseController::class,'deleteCause'])->name('delete.cause');


Route::view('/', 'admin.master', ['name' => 'home']);
Route::get('/donorform', [DonorController::class, 'CreateDonor'])->name('create.donor');
Route::post('/donorstore', [DonorController::class, 'StoreDonor'])->name('store.donor');
Route::get('/donorlist', [DonorController::class, 'DonorList'])->name('list.donor');
Route::get('/donorview/{donor_id}', [DonorController::class, 'DonorView'])->name('view.donor');

Route::get('/donoredit/{donor_id}', [DonorController::class, 'DonorEdit'])->name('edit.donor');
Route::put('/donorupdate/{donor_id}', [DonorController::class, 'DonorUpdate'])->name('update.donor');
Route::get('/donordelete/{donor_id}', [DonorController::class, 'DonorDelete'])->name('delete.donor');

Route::get('/donationform', [AdminController::class, 'CreateDonation'])->name('create.donation');

