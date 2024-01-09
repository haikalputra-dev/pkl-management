<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\InstansiReController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReController;
use App\Http\Controllers\MailController;


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



Route::get('send-mail', [MailController::class, 'index']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//admin grup midelweare
Route::middleware(['auth', 'role:admin'])->group(function () {

    //Dashboard Admin
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');


    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('admin/create/data', [AdminController::class, 'AdminCreateData'])->name('admin.create.data');
    Route::post('admin/data/store', [AdminController::class, 'AdminDataStore'])->name('admin.data.store');
    Route::get('admin/edit/data', [AdminController::class, 'AdminEditData'])->name('admin.edit.data');
    Route::delete('admin/data/delete', [AdminController::class, 'AdminDeleteUser'])->name('admin.delete.user');
    Route::post('admin/data/{type}/{id}',[AdminController::class, 'updateStatusAktif'])->name('admin.editStatus');


    // Route::get('admin/datamaster', [AdminController::class, 'AdminDataMaster'])->name('admin.DataMaster');
    // Route::get('admin/instansi', [AdminController::class, 'AdminInstansi'])->name('admin.instansi');
    Route::get('admin/instansi/{id}', [AdminController::class, 'editInstansi'])->name('admin.editInstansi');
    // Route::post('admin/instansi/{id}',[AdminController::class, 'updateInstansi'])->name('admin.updateInstansi');
    // Route::post('admin/instansi', [AdminController::class, 'insertInstansi'])->name('insertInstansi');
    Route::delete('admin/instansi/{id}', [AdminController::class,'destroyInstansi'])->name('deleteInstansi');

    Route::delete('user/delete/{id}',[UserReController::class,'destroyUser'])->name('deleteUser');


    Route::get('admin/tim/get-pembimbing/{id}',[TimController::class,'getPembimbingSiswa']);
    // Route::post('admin/tim/get-siswa',[TimController::class,'getSiswa'])->name('tim.getSiswa');

    Route::resource('admin/user', UserReController::class);
    Route::resource('admin/instansi', InstansiReController::class);
    Route::resource('admin/pembimbing', PembimbingController::class);
    Route::resource('admin/siswa', SiswaController::class);
    Route::resource('admin/tim', TimController::class);
    Route::resource('admin/staff', StaffController::class);

});

//mentor
Route::middleware(['auth', 'role:mentor'])->group(function () {

    Route::get('mentor/dashboard', [MentorController::class, 'MentorDashboard'])->name('mentor.dashboard');
    Route::get('mentor/absensi', [MentorController::class, 'MentorAbsensi'])->name('mentor.absensi');
    Route::get('mentor/create/absensi', [MentorController::class, 'MentorCreateAbsensi'])->name('mentor.create.absensi');

    Route::get('mentor/jurnal', [MentorController::class, 'MentorJurnal'])->name('mentor.jurnal');

    Route::get('mentor/logout', [MentorController::class, 'MentorLogout'])->name('Mentor.logout');
});

//staff
Route::middleware(['auth', 'role:staff'])->group(function () {

    Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

    Route::get('staff/dashboard', [StaffController::class, 'StaffDashboard'])->name('staff.dashboard');
    Route::get('staff/logout', [StaffController::class, 'StaffLogout'])->name('staff.logout');
});




//instansi
Route::middleware(['auth', 'role:instansi'])->group(function () {

    Route::get('instansi/dashboard', [InstansiController::class, 'InstansiDashboard'])->name('instansi.dashboard');
    Route::get('instansi/logout', [InstansiController::class, 'InstansiLogout'])->name('instansi.logout');
    // Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    

});

Route::middleware(['auth', 'role:siswa'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');

    Route::get('user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
});
