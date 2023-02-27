<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\GuruController;
use App\Http\Controllers\Pos\JabatanController;
use App\Http\Controllers\Pos\MapelController;
use App\Http\Controllers\Pos\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Admin All Route

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');
    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});


// All user
Route::controller(UserController::class)->group(function () {
    Route::get('/user/all', 'UserAll')->name('user.all');
    Route::get('/user/add', 'UserAdd')->name('user.add');
    Route::post('/user/store', 'UserStore')->name('user.store');
    Route::get('/user/view/{id}', 'UserView')->name('user.view');
    Route::get('/user/edit/{id}', 'UserEdit')->name('user.edit');
    Route::post('/user/update', 'UserUpdate')->name('user.update');
    Route::get('/user/delete{id}', 'UserDelete')->name('user.delete');
    Route::post('/user/reset', 'UserReset')->name('user.reset');
});

// Jabatan All Route
Route::controller(JabatanController::class)->group(function () {
    Route::get('/jabatan/all', 'JabatanAll')->name('jabatan.all');
    Route::get('/jabatan/add', 'JabatanAdd')->name('jabatan.add');
    Route::post('/jabatan/store', 'JabatanStore')->name('jabatan.store');
    Route::get('/jabatan/edit/{id}', 'JabatanEdit')->name('jabatan.edit');
    Route::post('/jabatan/update', 'JabatanUpdate')->name('jabatan.update');
    Route::get('/jabatan/delete{id}', 'JabatanDelete')->name('jabatan.delete');
});

// Guru All Route
Route::controller(GuruController::class)->group(function () {
    Route::get('/guru/all', 'GuruAll')->name('guru.all');
    Route::get('/guru/add', 'GuruAdd')->name('guru.add');
    Route::post('/guru/store', 'GuruStore')->name('guru.store');
    Route::get('/guru/edit/{id}', 'GuruEdit')->name('guru.edit');
    Route::post('/guru/update', 'GuruUpdate')->name('guru.update');
    Route::get('/guru/delete{id}', 'GuruDelete')->name('guru.delete');
});

// Guru All Route
Route::controller(MapelController::class)->group(function () {
    Route::get('/mapel/all', 'MapelAll')->name('mapel.all');
    Route::get('/mapel/add', 'MapelAdd')->name('mapel.add');
    Route::post('/mapel/store', 'MapelStore')->name('mapel.store');
    Route::get('/mapel/edit/{id}', 'MapelEdit')->name('mapel.edit');
    Route::post('/mapel/update', 'MapelUpdate')->name('mapel.update');
    Route::get('/mapel/delete{id}', 'MapelDelete')->name('mapel.delete');
});







Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
