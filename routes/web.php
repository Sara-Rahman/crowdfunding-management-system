<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Website\UserController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\VolunteerController;
use App\Http\Controllers\admin\UserController as AdminUserController;


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
 
//Category
Route::get('/showcategory',[CategoryController::class,'showcategory'])->name('show.category');  
Route::get('/createcategory',[CategoryController::class,'creatcategory'])->name('create.category'); 
Route::post('/storecategory',[CategoryController::class,'storecategory'])->name('store.category'); 
Route::get('/viewcategory/{id}',[CategoryController::class,'Viewcategory'])->name('view.category'); 
Route::get('/Edit/category/{categoryr_id}',[CategoryController::class,'editcategory'])->name('edit.category');
Route::put('/Update/category/{categoryr_id}',[CategoryController::class,'Updatecategory'])->name('update.category');
Route::get('/deletecategoryr/{id}',[CategoryController::class,'Deletecategory'])->name('delete.category'); 

