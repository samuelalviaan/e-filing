<?php

use App\Http\Controllers\ArchiveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'CodeArchiveController@index')->name('arsip.home');

// Route untuk arsip
Route::resource('archive', 'ArchiveController');
Route::get('/history', 'ArchiveController@history')->name('archives.history');
Route::get('archive/{id}/download', 'ArchiveController@download')->name('archives.download');
Route::get('lihat/{archive}', 'ArchiveController@lihatArsip')->name('archives.lihatarsip');
Route::get('/cetak_pdf', [ArchiveController::class,'showPDF']);

// Route untuk kode arsip
Route::resource('code_archive', 'CodeArchiveController');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');


