<?php

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
    return view('login');
});

// Route::get('/home', function () {
//     return view('home/login');
// });

Route::get('tes-template', function () {
    return view('home');
});
// routing untuk API
Route::post('kehadiran/api','ApiController@kehadiran');

Route::get('pengaturan','SettingController@index');
Route::post('pengaturan','SettingController@save');

Route::delete('hapus-pola-kerja-kelompok-pegawai/{id}','KelompokKerjaController@hapusPolaKerja');
// Route::delete('hapus-pola-kerja-kelompok-pegawai/{id}','KelompokKerjaController@hapusPolaKerja');
Route::get('kelompokkerja/{id}/polakerja','KelompokKerjaController@polaKerja');
Route::post('simpan-pola-kerja-kelompok-pegawai','KelompokKerjaController@simpanPolaKerja');
Route::post('tambah-kelompok-kerja','KelompokKerjaController@tambahAnggota');
Route::resource('/kelompokkerja','KelompokKerjaController');

Route::post('tambah-kelompok-kerja','KelompokKerjaController@tambahAnggota');
Route::delete('hapus-anggota-kelompok-kerja/{id}','KelompokKerjaController@hapusAnggota');

Route::resource('/polakerja','PolaKerjaController');

Route::get('/polakerja/{id}/delete','PolaKerjaController@delete');

Route::resource('/jabatan','JabatanController');

Route::get('/jabatan/{kode_jabatan}/delete','JabatanController@delete');

Route::resource('/golongan','GolonganController');

Route::get('/golongan/{kode_golongan}/delete','GolonganController@delete');

Route::resource('/pangkat','PangkatController');

Route::get('/pangkat/{kode_pangkat}/delete','PangkatController@delete');

Route::get('/pegawai/{nip}/kehadiran','PegawaiController@kehadiran');

Route::get('/pegawai/{nip}/lembur','PegawaiController@lembur');
Route::get('/pegawai/{nip}/lembur','PegawaiController@lembur');

Route::get('pegawai/{nip}/polakerja','PegawaiController@polaKerja');
Route::resource('/pegawai','PegawaiController');

Route::resource('/kalenderKerja','KalenderKerjaController');

// Route::get('/kalenderKerja/{id}/delete','KalenderController@delete');

Route::resource('komponengaji','KomponenGajiController');

Route::get('lembur','LemburController@index');
Route::get('lembur/create','LemburController@create');
Route::post('lembur','LemburController@store');
Route::post('ubah-periode-lembur','LemburController@ubahPeriodeLembur');
Route::delete('hapus-riwayat-lembur/{id}/{url}','LemburController@destroy');

Route::post('export-laporan-kehadiran-excel','KehadiranController@excel');
Route::post('upload-excel-kehadiran','KehadiranController@import');

Route::get('kehadiran','KehadiranController@index');
Route::get('kehadiran/create','KehadiranController@create');
Route::post('kehadiran','KehadiranController@store');
Route::post('ubah-periode-kehadiran','KehadiranController@ubahPeriodeKehadiran');

Route::resource('komponengaji','KomponenGajiController');
Route::resource('gaji','GajiController');
Route::post('ubah-periode-gaji','GajiController@ubahPeriodeGaji');
Route::post('tambah-komponen-gaji-detail','GajiController@tambahKomponenDetail');
Route::delete('hapus-komponen-gaji-detail/{id}','GajiController@hapusKomponengajiDetail');
Route::get('gaji/{id}/pdf','GajiController@pdf');

// Route::get('login/locked', 'Auth\LoginController@locked')->middleware('auth')->name('login.locked');
// Route::post('login/locked', 'Auth\LoginController@unlock')->name('login.unlock');
Auth    ::routes();
//Route::get('/lockscreen', 'LockscreenController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('template-gaji','GajiController@templateGaji');
Route::get('/profile','ProfileController@index');

Route::get('google-line-chart','HomeController@googleLineChart');