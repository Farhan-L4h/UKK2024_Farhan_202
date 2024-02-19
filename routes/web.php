<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Rute
Route::controller(AdminController::class)->middleware('auth', 'HakAkses:admin')->group(function () {
    // view
    Route::get('/admin', 'index')->name('admin.index');
    Route::get('/admin.kategori', 'kategori')->name('admin.kategori');
    Route::get('/admin.obat', 'obat')->name('admin.obat');
    Route::get('/admin.penjualan', 'penjualan')->name('admin.penjualan');
    Route::get('/admin.user', 'user')->name('admin.user');
    Route::get('/admin.pelanggan', 'pelanggan')->name('admin.pelanggan');
    
    // form kategori
    Route::get('/admin.kategori.create', 'kategoricreate')->name('admin.kategori.create');
    Route::post('/admin.kategori.store', 'kategoristore')->name('admin.kategori.store');
    Route::get('/admin.kategori.edit.{id}', 'kategoriedit')->name('admin.kategori.edit');
    Route::post('/admin.kategori.update.{id}', 'kategoriupdate')->name('admin.kategori.update');
    Route::get('/admin.kategori.delete.{id}', 'kategoridelete')->name('admin.kategori.delete');

    // form obat
    Route::get('/admin.obat.create', 'obatcreate')->name('admin.obat.create');
    Route::post('/admin.obat.store', 'obatstore')->name('admin.obat.store');
    Route::get('/admin.obat.edit.{id}', 'obatedit')->name('admin.obat.edit');
    Route::post('/admin.obat.update.{id}', 'obatupdate')->name('admin.obat.update');
    Route::get('/admin.obat.delete.{id}', 'obatdelete')->name('admin.obat.delete');


    // form penjualan
    Route::get('/admin.penjualan.create', 'penjualancreate')->name('admin.penjualan.create');
    Route::post('/admin.penjualan.store', 'penjualanstore')->name('admin.penjualan.store');
    Route::get('/admin.penjualan.edit.{id}', 'penjualanedit')->name('admin.penjualan.edit');
    Route::post('/admin.penjualan.update.{id}', 'penjualanupdate')->name('admin.penjualan.update');
    Route::get('/admin.penjualan.delete.{id}', 'penjualandelete')->name('admin.penjualan.delete');
    Route::get('/admin.penjualan.struck.{id}', 'penjualanstruck')->name('admin.penjualan.struck');
    Route::get('/admin.penjualan.keuangan', 'keuangan')->name('admin.penjualan.keuangan');


    // form user
    Route::get('/admin.user.create', 'usercreate')->name('admin.user.create');
    Route::post('/admin.user.store', 'userstore')->name('admin.user.store');
    Route::get('/admin.user.edit.{id}', 'useredit')->name('admin.user.edit');
    Route::post('/admin.user.update.{id}', 'userupdate')->name('admin.user.update');
    Route::get('/admin.user.delete.{id}', 'userdelete')->name('admin.user.delete');
   
    // form pelanggan
    Route::get('/admin.pelanggan.create', 'pelanggancreate')->name('admin.pelanggan.create');
    Route::post('/admin.pelanggan.store', 'pelangganstore')->name('admin.pelanggan.store');
    Route::get('/admin.pelanggan.edit.{id}', 'pelangganedit')->name('admin.pelanggan.edit');
    Route::post('/admin.pelanggan.update.{id}', 'pelangganupdate')->name('admin.pelanggan.update');
    Route::get('/admin.pelanggan.delete.{id}', 'pelanggandelete')->name('admin.pelanggan.delete');

    
});


// User Rute
Route::controller(UserController::class)->group(function () {
    // view
    Route::get('/user', 'index')->name('user.index');
    // vadilasi pelanggan 
    Route::get('/user.verti.{id}', 'vertipelanggan')->name('user.verti');
});

// Route::controller(KaryawanController::class)->middleware('auth', 'HakAkses:karyawan')->group(function () {
//     // view
//     Route::get('/karyawan.penjualan', 'penjualan')->name('karyawan.penjualan');
//     Route::get('/karyawan.pelanggan', 'pelanggan')->name('karyawan.pelanggan');

//     // form pelanggan
//     Route::get('/karyawan.pelanggan.create', 'pelanggancreate')->name('karyawan.pelanggan.create');
//     Route::post('/karyawan.pelanggan.store', 'pelangganstore')->name('karyawan.pelanggan.store');
//     Route::get('/karyawan.pelanggan.edit.{id}', 'pelangganedit')->name('karyawan.pelanggan.edit');
//     Route::post('/karyawan.pelanggan.update.{id}', 'pelangganupdate')->name('karyawan.pelanggan.update');
//     Route::get('/karyawan.pelanggan.delete.{id}', 'pelanggandelete')->name('karyawan.pelanggan.delete');

//      // form penjualan
//      Route::get('/karyawan.penjualan.create', 'penjualancreate')->name('karyawan.penjualan.create');
//      Route::post('/karyawan.penjualan.store', 'penjualanstore')->name('karyawan.penjualan.store');
//      Route::get('/karyawan.penjualan.edit.{id}', 'penjualanedit')->name('karyawan.penjualan.edit');
//      Route::post('/karyawan.penjualan.update.{id}', 'penjualanupdate')->name('karyawan.penjualan.update');
//      Route::get('/karyawan.penjualan.delete.{id}', 'penjualandelete')->name('karyawan.penjualan.delete');
//      Route::get('/karyawan.penjualan.struck.{id}', 'penjualanstruck')->name('karyawan.penjualan.struck');
// });
