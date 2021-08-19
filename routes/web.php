<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CodeArchiveController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/archives', [ArchiveController::class, 'index'])->name('archives.index');
Route::get('/archives/create', [ArchiveController::class, 'create'])->name('archives.create');
Route::post('/archives/store', [ArchiveController::class, 'store'])->name('archives.store');
Route::get('/archives/show/{id}', [ArchiveController::class, 'show'])->name('archives.show');
Route::get('/archives/edit/{id}', [ArchiveController::class, 'edit'])->name('archives.edit');
Route::post('/archives/update/{id}', [ArchiveController::class, 'update'])->name('archives.update');


// Route untuk arsip
Route::get('/riwayat', [ArchiveController::class, 'history'])->name('archives.history'); // riwayat arsip
Route::get('archives/{id}/download', [ArchiveController::class, 'download'])->name('archives.download'); // download arsip
Route::get('/view_pdf', [ArchiveController::class, 'viewPDF'])->name('archives.viewPDF');
Route::get('/cetak_pdf', [ArchiveController::class, 'showPDF'])->name('cetak_pdf');
Route::get('/search', [ArchiveController::class, 'search'])->name('archives.search'); // cari arsip

Route::middleware(['superadmin'])->group(function () {

    //route untuk arsip
    Route::delete('/archives/delete/{id}', [ArchiveController::class, 'destroy'])->name('archives.destroy');

    // route untuk kode arsip
    Route::get('/code_archives', [CodeArchiveController::class, 'index'])->name('code_archives.index');
    Route::get('/code_archives/create', [CodeArchiveController::class, 'create'])->name('code_archives.create');
    Route::post('/code_archives/store', [CodeArchiveController::class, 'store'])->name('code_archives.store');
    Route::get('/code_archives/edit/{id}', [CodeArchiveController::class, 'edit'])->name('code_archives.edit');
    Route::post('/code_archives/update/{id}', [CodeArchiveController::class, 'update'])->name('code_archives.update');
    Route::get('/code_archives/delete/{id}', [CodeArchiveController::class, 'destroy'])->name('code_archives.destroy');

    //Route untuk user controller
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // view home halaman daftar user
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // view tambah user
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store'); // insert data
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // hapus user
});

// route untuk user
Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit'); // view edit user
Route::put('/users/update', [UserController::class, 'update'])->name('users.update'); // update user

// Route untuk laporan
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/cetak_laporan', [ReportController::class, 'cetak_laporan'])->name('reports.cetak');
Route::get('/reports/filter', [ReportController::class, 'filter'])->name('reports.filter');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
