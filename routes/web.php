<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// User related routes
Route::get('/user-login',[LoginController::class,'user_login'])->name('user-login');
Route::post('/authenticate-user',[LoginController::class,'authenticate_user'])->name('authenticate_user');
Route::get('/add-aapointment',[UserController::class,'add_appointment'])->name('add-appointment');
Route::post('/save_appointment',[UserController::class,'new_appointment'])->name('save_appointment');
Route::get('/all_appointments',[UserController::class,'all_appointment'])->name('all_appointments');
Route::get('/new_patient',[UserController::class,'new_patient'])->name('new_patient');
Route::post('/register_user',[UserController::class,'save_new_user'])->name('register_user');
Route::get('/update_patient',[UserController::class,'update_patient'])->name('update_patient');
Route::post('/save_patient_update/{id}',[UserController::class,'save_patient_update'])->name('save_patient_update');

// Admin related routes
Route::get('/admin-login',[LoginController::class,'admin_login'])->name('admin-login');
Route::post('/authenticate-admin',[LoginController::class,'authenticate_admin'])->name('authenticate_admin');
Route::get('/appointment_master',[AdminController::class,'appointment_master'])->name('appointment_master');
Route::get('/approve_appointment/{id}',[AdminController::class,'approve_appointment'])->name('approve_appointment');
Route::get('/reject_appointment/{id}',[AdminController::class,'reject_appointment'])->name('reject_appointment');
Route::post('/save_admin_update',[AdminController::class,'save_admin_update'])->name('save_admin_update');
Route::get('/update_admin',[AdminController::class,'update_admin'])->name('update_admin');  