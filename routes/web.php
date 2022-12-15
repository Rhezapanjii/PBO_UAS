<?php
namespace App\Http\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BarangController;




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
    return view('welcome');
});

Auth::routes();
Route::get('sending-queue-emails', [TestQueueEmails::class,'sendTestEmails']);

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('kirim-email','App\Http\Controllers\TestQueueEmails@sendTestEmails');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');


Route::get('/users/userpdf', [\App\Http\Controllers\UserController::class, 'userpdf']);

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

// Route::get('/barang/cetakpdf',[\App\Http\Controllers\BarangController::class, 'Barang.cetakpdf'] )
// ->name('barang.cetakpdf')->middleware('auth');




Route::get('/barang/cetakpdf', [\App\Http\Controllers\BarangController::class, 'cetakpdf']);

Route::resource('barang', \App\Http\Controllers\BarangController::class)
    ->middleware('auth');

// Route::get('barang/cetakpdsf','HomeController@pdf');

    // Route::resource('barang/cetakpdf', \App\Http\Controllers\BarangController-cetakPDF::class)
    // ->middleware('auth');

    