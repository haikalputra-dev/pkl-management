<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InstansiController;
use App\Http\Middleware\Role;

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

Route::get('/', function () {
    return view('front/main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    //Dashboard Admin
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    //data Auth
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('admin/datamaster', [AdminController::class, 'AdminDataMaster'])->name('admin.DataMaster');
});



//mentor
Route::middleware(['auth', 'role:mentor'])->group(function () {

    Route::get('mentor/dashboard', [MentorController::class, 'MentorDashboard'])->name('mentor.dashboard');
    // Route::get('mentor/logout', [MentorController::class, 'MentorLogout'])->name('Mentor.logout');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});

//staff
Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('staff/dashboard', [StaffController::class, 'StaffDashboard'])->name('staff.dashboard');
    // Route::get('/logout', [StaffController::class, 'UserLogout'])->name('User.logout');
});

//instansi
Route::middleware(['auth', 'role:instansi'])->group(function () {

    Route::get('Instansi/dashboard', [InstansiController::class, 'InstansiDashboard'])->name('instansi.dashboard');
    // Route::get('mentor/logout', [MentorController::class, 'MentorLogout'])->name('Mentor.logout');
    // Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
});
