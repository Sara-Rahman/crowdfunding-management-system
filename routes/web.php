<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\VolunteerController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\admin\CauseController;
use App\Http\Controllers\admin\DonorController;
use App\Http\Controllers\website\UserController;


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


Route::view('/admin', 'admin.login', ['name' => 'home']);


// Volunteer

Route::controller(VolunteerController::class)->group(function () {

    Route::get('/showvoluteer','showVolunteer')->name('show.volunteer'); 
    Route::get('/createvoluteer','creatVolunteer')->name('create.volunteer'); 
    Route::post('/storevoluteer','storeVolunteer')->name('store.volunteer'); 
    Route::get('/viewvoluteer/{id}','ViewVolunteerProfile')->name('view.volunteer'); 
    Route::get('/Edit/VolunteerProfile/{volunteer_id}','editVolunteerProfile')->name('edit.volunteer');
    Route::put('/Update/VolunteerProfile/{volunteer_id}','UpdateVolunteerProfile')->name('update.volunteer');
    Route::get('/deletevoluteer/{id}','DeleteVolunteerProfile')->name('delete.volunteer');

});


// Category

Route::controller(CategoryController::class)->group(function () {

    Route::get('/showcategory','showcategory')->name('show.category');  
    Route::get('/createcategory','creatcategory')->name('create.category'); 
    Route::post('/storecategory','storecategory')->name('store.category'); 

    // Category view,update,delete

    Route::get('/viewcategory/{id}','Viewcategory')->name('view.category'); 
    Route::get('/Edit/category/{categoryr_id}','editcategory')->name('edit.category');
    Route::put('/Update/category/{categoryr_id}','Updatecategory')->name('update.category');
    Route::get('/deletecategoryr/{id}','Deletecategory')->name('delete.category'); 

});




// Cause

Route::controller(CauseController::class)->group(function () {

    Route::get('/cause','cause')->name('cause.list');
    Route::get('/create/cause','createCause')->name('create.cause');
    Route::post('/store/cause','storeCause')->name('store.cause');

    // Cause view,update,delete

    Route::get('/view/cause/{cause_id}','viewCause')->name('view.cause');
    Route::get('/edit/cause/{cause_id}','editCause')->name('edit.cause');
    Route::put('/update/cause/{cause_id}','updateCause')->name('update.cause');
    Route::get('/delete/cause/{cause_id}','deleteCause')->name('delete.cause');

});



// Donor

Route::controller(DonorController::class)->group(function () {
    
    Route::get('/donorform','CreateDonor')->name('create.donor');
    Route::post('/donorstore','StoreDonor')->name('store.donor');
    Route::get('/donorlist','DonorList')->name('list.donor');

    // Donor view,update,delete

    Route::get('/donorview/{donor_id}','DonorView')->name('view.donor');
    Route::get('/donoredit/{donor_id}','DonorEdit')->name('edit.donor');
    Route::put('/donorupdate/{donor_id}','DonorUpdate')->name('update.donor');
    Route::get('/donordelete/{donor_id}','DonorDelete')->name('delete.donor');

});


Route::get('/donationform', [AdminController::class, 'CreateDonation'])->name('create.donation');


