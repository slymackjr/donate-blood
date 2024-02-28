<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
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

Route::get('/', [StaffController::class, 'index'])->name('index.home');

/* hospital officer routes  */
Route::get('/login-staff', [StaffController::class, 'showLoginForm'])->name('login.staff');
Route::post('/login-staff', [StaffController::class, 'login'])->name('login.staff.method');

Route::get('/register-staff', [StaffController::class, 'showRegisterForm'])->name('register.staff');
Route::post('/register-staff', [StaffController::class, 'register'])->name('register.staff.method');

Route::middleware(['staff.auth'])->get('/request-donor', [StaffController::class, 'RequestDonor'])->name('staff.requestDonor');
Route::middleware(['staff.auth'])->get('/sent-requests', [StaffController::class, 'viewRequests'])->name('staff.viewRequests');
Route::middleware(['staff.auth'])->post('/sent-requests', [StaffController::class, 'cancelRequest'])->name('staff.cancelRequest');
Route::middleware(['staff.auth'])->get('/accept-requests', [StaffController::class, 'viewAcceptedRequests'])->name('staff.viewAcceptedRequests');
Route::middleware(['staff.auth'])->post('/accept-requests', [StaffController::class, 'deleteRequest'])->name('staff.deleteRequest');
Route::middleware(['staff.auth'])->get('/our-info', [StaffController::class, 'showAboutUs'])->name('staff.aboutUs');
Route::middleware(['staff.auth'])->get('/messages', [StaffController::class, 'showContactUs'])->name('staff.contactUs');
Route::middleware(['staff.auth'])->match(['get', 'post'], '/create-request', [StaffController::class, 'showCreateRequest'])->name('staff.createRequest');
Route::middleware(['staff.auth'])->post('/submit-request', [StaffController::class, 'submitRequest'])->name('staff.submitRequest');
Route::middleware(['staff.auth'])->get('/users', [StaffController::class, 'showUsers'])->name('staff.users');
Route::middleware(['staff.auth'])->get('/staff-profile', [StaffController::class, 'showProfile'])->name('staff.profile');

Route::get('/exit', [StaffController::class, 'logout'])->name('logout.staff')->middleware('staff.auth');  


/* donor routes */
Route::get('/login-donor', [DonorController::class, 'showLoginForm'])->name('login.donor');
Route::post('/login-donor', [DonorController::class, 'login'])->name('login.donor.method');
Route::get('/logout', [DonorController::class, 'logout'])->name('logout.donor')->middleware('donor.auth');  

Route::get('/register-donor', [DonorController::class, 'showRegisterForm'])->name('register.donor');
Route::post('/register-donor', [DonorController::class, 'register'])->name('register.donor.method');

Route::middleware(['donor.auth'])->get('/home-donor', [DonorController::class, 'viewRequests'])->name('donor.showRequests');
Route::middleware(['donor.auth'])->post('/home-donor', [DonorController::class, 'rejectRequests'])->name('donor.rejectRequest');
Route::middleware(['donor.auth'])->post('/home-donor', [DonorController::class, 'approveRequests'])->name('donor.approveRequest');
Route::middleware(['donor.auth'])->get('/donor-appointment', [DonorController::class, 'viewAppointments'])->name('donor.showAppointments');
Route::middleware(['donor.auth'])->get('about-us', [DonorController::class, 'showAboutUs'])->name('donor.aboutUs');
Route::middleware(['donor.auth'])->get('contact-us', [DonorController::class, 'showContactUs'])->name('donor.contactUs');
Route::middleware(['donor.auth'])->get('donor-profile', [DonorController::class, 'showProfile'])->name('donor.profile');

