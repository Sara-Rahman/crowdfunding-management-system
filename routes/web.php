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


Route::get('/', function () {
    return view('admin.master');
});


//Volunteer
Route::get('/showvoluteer',[VolunteerController::class,'showVolunteer'])->name('show.volunteer'); 
Route::get('/createvoluteer',[VolunteerController::class,'creatVolunteer'])->name('create.volunteer'); 
Route::post('/storevoluteer',[VolunteerController::class,'storeVolunteer'])->name('store.volunteer'); 
Route::get('/viewvoluteer/{id}',[VolunteerController::class,'ViewVolunteerProfile'])->name('view.volunteer'); 
Route::get('/Edit/VolunteerProfile/{volunteer_id}',[VolunteerController::class,'editVolunteerProfile'])->name('edit.volunteer');
Route::put('/Update/VolunteerProfile/{volunteer_id}',[VolunteerController::class,'UpdateVolunteerProfile'])->name('update.volunteer');
Route::get('/deletevoluteer/{id}',[VolunteerController::class,'DeleteVolunteerProfile'])->name('delete.volunteer');
 

Route::post('search', ['as' => 'search', 'uses' => 'AdminController@search']);

//Category
Route::get('showcategory', 'CategoryController@showcategory')->name('show.category');;
//Route::get('/showcategory',[CategoryController::class,'showcategory'])->name('show.category');  
Route::get('/createcategory',[CategoryController::class,'creatcategory'])->name('create.category'); 
Route::post('/storecategory',[CategoryController::class,'storecategory'])->name('store.category'); 
Route::get('/viewcategory/{id}',[CategoryController::class,'Viewcategory'])->name('view.category'); 
Route::get('/Edit/category/{categoryr_id}',[CategoryController::class,'editcategory'])->name('edit.category');
Route::put('/Update/category/{categoryr_id}',[CategoryController::class,'Updatecategory'])->name('update.category');
Route::get('/deletecategoryr/{id}',[CategoryController::class,'Deletecategory'])->name('delete.category'); 

// Cause
Route::get('/cause',[CauseController::class,'cause'])->name('cause.list');
Route::get('/create/cause',[CauseController::class,'createCause'])->name('create.cause');
Route::post('/store/cause',[CauseController::class,'storeCause'])->name('store.cause');

// Cause view,update,delete
Route::get('/view/cause/{cause_id}',[CauseController::class,'viewCause'])->name('view.cause');
Route::get('/edit/cause/{cause_id}',[CauseController::class,'editCause'])->name('edit.cause');
Route::put('/update/cause/{cause_id}',[CauseController::class,'updateCause'])->name('update.cause');
Route::get('/delete/cause/{cause_id}',[CauseController::class,'deleteCause'])->name('delete.cause');


Route::view('/', 'admin.master', ['name' => 'home']);
// donor
Route::get('/donorform', [DonorController::class, 'CreateDonor'])->name('create.donor');
Route::post('/donorstore', [DonorController::class, 'StoreDonor'])->name('store.donor');
Route::get('/donorlist', [DonorController::class, 'DonorList'])->name('list.donor');
Route::get('/donorview/{donor_id}', [DonorController::class, 'DonorView'])->name('view.donor');

Route::get('/donoredit/{donor_id}', [DonorController::class, 'DonorEdit'])->name('edit.donor');
Route::put('/donorupdate/{donor_id}', [DonorController::class, 'DonorUpdate'])->name('update.donor');
Route::get('/donordelete/{donor_id}', [DonorController::class, 'DonorDelete'])->name('delete.donor');

Route::get('/donationform', [AdminController::class, 'CreateDonation'])->name('create.donation');


