<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/sms/test', 'SMSController@smsGateway')->name("sms.coba");
//Global Route
Route::get('/welcome', function () {
    return view('welcome');
})->name("welcome");

Route::get('/sekolah/pendaftaran', 'RegisterController@index')->name("pendaftaran");
Route::post('/sekolah/pendaftaran', 'RegisterController@create')->name("pendaftaran");
Route::post('/sekolah/pendaftaran/cetak', 'RegisterController@pdf')->name("pendaftaran.cetak");

Route::get('/home', 'HomeController@index')->name('home');

//User Route
Route::get('user/reset-password','Auth\ResetPasswordController@index')->name('user.password_reset');
Route::post('user/reset-proccess','Auth\ResetPasswordController@resetPassword')->name('user.proccess_reset');

Route::get('user/absen','User\AbsenController@index')->name('user.absen');
Route::get('user/absen/buka','User\AbsenController@open')->name('user.absen.buka');
Route::get('user/absen/tutup','User\AbsenController@close')->name('user.absen.tutup');
Route::post('user/absen/update','User\AbsenController@updateAbsen')->name('user.absen.update');

Route::get('user/laporan','User\LaporanController@index')->name('user.laporan');
Route::get('user/laporan/grafik','User\LaporanController@grafik')->name('user.laporan.grafik');
Route::post('user/laporan/data','User\LaporanController@tabel')->name('user.laporan.data');

//Admin Route
Route::get('admin/penerimaan','Admin\PenerimaanController@index')->name('admin.penerimaan');

Route::get('admin/sekolah','Admin\SekolahController@index')->name('admin.sekolah');
Route::get('admin/sekolah/tutup','Admin\SekolahController@close')->name('admin.sekolah.tutup');
Route::get('admin/sekolah/buka','Admin\SekolahController@open')->name('admin.sekolah.buka');
Route::post('admin/sekolah/update','Admin\SekolahController@update')->name('admin.sekolah.update');

Route::get('admin/guru','Admin\GuruController@index')->name('admin.guru');
Route::get('admin/guru/{id?}','Admin\GuruController@destroy')->name('admin.guru.hapus');
Route::post('admin/guru','Admin\GuruController@create')->name('admin.guru');
Route::post('admin/guru/update','Admin\GuruController@update')->name('admin.guru.edit');

Route::get('admin/kelas','Admin\KelasController@index')->name('admin.kelas');
Route::get('admin/kelas/hapus/{id}','Admin\KelasController@destroy')->name('admin.kelas.hapus');
Route::post('admin/kelas','Admin\KelasController@create')->name('admin.kelas');
Route::post('admin/kelas/update','Admin\KelasController@update')->name('admin.kelas.update');

Route::get('admin/siswa','Admin\SiswaController@index')->name('admin.siswa');
Route::post('admin/siswa/kelas','Admin\SiswaController@editKelas')->name('admin.siswa.kelas');
Route::get('admin/siswa/hapus/{id?}','Admin\SiswaController@destroy')->name('admin.siswa.hapus');
Route::post('admin/siswa/edit','Admin\SiswaController@update')->name('admin.siswa.edit');

Route::get('admin/penerimaan','Admin\PenerimaanController@index')->name('admin.penerimaan');
Route::get('admin/penerimaan/hapus/{id?}','Admin\PenerimaanController@destroy')->name('admin.penerimaan.hapus');
Route::get('admin/penerimaan/terima/{id?}','Admin\PenerimaanController@accept')->name('admin.penerimaan.terima');
Route::post('admin/penerimaan/edit','Admin\PenerimaanController@update')->name('admin.penerimaan.edit');

Route::get('admin/absensi','Admin\AbsenController@index')->name('admin.absensi');
Route::get('admin/laporan/grafik','Admin\AbsenController@grafik')->name('admin.absensi.grafik');
Route::post('admin/laporan/data','Admin\AbsenController@tabel')->name('admin.absensi.data');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('login');
Route::post('auth/login', 'Auth\AuthController@postLogin')->name('login');
Route::any('auth/logout', 'Auth\AuthController@getLogout')->name('logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);

Route::get('{any?}', function ($any) {
    return redirect()->route('welcome');
})->where('any', '.*');
