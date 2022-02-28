<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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



Route::view('/', 'admin.master', ['name' => 'home']);
Route::get('/donorform', [DonorController::class, 'CreateDonor'])->name('create.donor');
Route::post('/donorstore', [DonorController::class, 'StoreDonor'])->name('store.donor');
Route::get('/donorlist', [DonorController::class, 'DonorList'])->name('list.donor');
Route::get('/donorview/{donor_id}', [DonorController::class, 'DonorView'])->name('view.donor');

Route::get('/donoredit/{donor_id}', [DonorController::class, 'DonorEdit'])->name('edit.donor');
Route::put('/donorupdate/{donor_id}', [DonorController::class, 'DonorUpdate'])->name('update.donor');
Route::get('/donordelete/{donor_id}', [DonorController::class, 'DonorDelete'])->name('delete.donor');

Route::get('/donationform', [AdminController::class, 'CreateDonation'])->name('create.donation');