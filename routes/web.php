<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', [StaffController::class, 'index'])->name('index.home');

Route::get('/login-staff', [StaffController::class, 'showLoginForm'])->name('login.staff');
Route::post('/login-staff', [StaffController::class, 'login'])->name('login.staff.method');

Route::get('/register-staff', [StaffController::class, 'showRegisterForm'])->name('register.staff');
Route::post('/register-staff', [StaffController::class, 'register'])->name('register.staff.method');

Route::middleware(['staff.auth'])->get('/request-donor', [StaffController::class, 'RequestDonor'])->name('staff.requestDonor');

Route::get('/logout', [StaffController::class, 'logout'])->name('logout.staff')->middleware('staff.auth');    
