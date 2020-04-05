<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');

    // Ruote Preusahaan
    Route::get('/perusahaan', 'Admin\Companies\CompaniesController@index')->name('perusahaan');
    Route::post('/perusahaan', 'Admin\Companies\CompaniesController@store')->name('perusahaan.store');
    Route::patch('/perusahaan', 'Admin\Companies\CompaniesController@update')->name('perusahaan.update');
    Route::delete('/perusahaan', 'Admin\Companies\CompaniesController@destroy')->name('perusahaan.update');

    // Route karyawan
    Route::get('/karyawan', 'Admin\Employees\EmployeesController@index')->name('karyawan');
});
