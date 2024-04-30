<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TutionController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TutionsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/tutions',[TutionsController::class,'index'])->name('tutions');

Route::get('/tutions/detail/{id}',[TutionsController::class,'detail'])->name('tutionDetail');
Route::post('/apply-tution',[TutionsController::class,'applyTution'])->name('applyTution');
Route::post('/save-tution',[TutionsController::class,'saveTution'])->name('saveTution');




Route::get('/account/register',[AccountController::class,'registration'])->name('account.registration');
Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processregistration');
Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
Route::post('/account/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');
Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
// Route::put('/account/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
Route::get('/account/logout', [AccountController::class,'logout'])->name('account.logout');

Route::post('account/updateProfile',[AccountController::class, 'updateProfile'])->name('account.updateProfile');


Route::get('account/update-profile-pic',[AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');

Route::get('/account/create-tution', [AccountController::class, 'createTution'])->name('account.createTution');

Route::post('/account/save-tution', [AccountController::class, 'saveJob'])->name('account.saveTution');

Route::get('/account/my-tutions', [AccountController::class, 'myTution'])->name('account.myTution');

Route::get('/account/my-tutions/edit/{tutionId}', [AccountController::class, 'editTution'])->name('account.editTution');


Route::post('/account/update-tution/{tutionId}', [AccountController::class, 'updateJob'])->name('account.updateJob');


Route::post('/account/delete-tution', [AccountController::class, 'deleteTution'])->name('account.deleteTution');

Route::get('/account/my-tution-applications', [AccountController::class, 'myTutionApplications'])->name('account.myTutionApplications');
Route::post('/account/remove-tution-application', [AccountController::class, 'removeTutions'])->name('account.removeTutions');


Route::get('/account/saved-tutions', [AccountController::class, 'saveTutions'])->name('account.saveTutions');

Route::post('/account/remove-saved-tution', [AccountController::class, 'removeSavedJob'])->name('account.removeSavedJob');
Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');



//Allroute are well: Thanks God



//admin

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/users/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('admin/users/{id}',[UserController::class, 'updateProfile'])->name('admin.updateProfile');
Route::delete('admin/users/destroy',[UserController::class, 'destroy'])->name('admin.users.destroy');
Route::get('/admin/tutions',[TutionController::class, 'index'])->name('admin.tutions');
Route::get('/admin/tutions/edit/{id}',[TutionController::class, 'edit'])->name('admin.tutions.edit');
Route::post('/admin/tutions/edit/{id}',[TutionController::class, 'update'])->name('admin.tutions.update');

