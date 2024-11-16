<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AutentikasiController;
use Illuminate\Support\Facades\Route;



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



//Route::get('/login', function () {
//   return view('login');
//});


Route::get('/',[AutentikasiController::class, 'login']) ->name('login');
Route::post('/login',[AutentikasiController::class, 'loginStore']) ->name('login.Store');
Route::post('/logout',[AutentikasiController::class, 'logout']) ->name('logout');

Route::get('/admin',[UserController::class, 'index'])->name('admin.index');

Route::get('/admin/mahasiswa',[MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/admin/mahasiswa/create',[MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/admin/mahasiswa/create',[MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/admin/mahasiswa/edit/{id}',[MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/admin/mahasiswa/edit/{id}',[MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/admin/mahasiswa/delete/{id}',[MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
Route::get('/admin/mahasiswa/print',[MahasiswaController::class, 'print'])->name('mahasiswa.print');
