<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/companies', 'API\Companies\CompaniesController@index');
Route::post('/company', 'API\Companies\CompaniesController@store');
Route::delete('/company/{id}', 'API\Companies\CompaniesController@destroy');
Route::put('/company/{id}', 'API\Companies\CompaniesController@update');

Route::get('/employees', 'API\Employees\EmployeesController@index');
Route::get('/employees/{id}', 'API\Employees\EmployeesController@show');
Route::post('/employee', 'API\Employees\EmployeesController@store');
Route::delete('/employee/{id}', 'API\Employees\EmployeesController@destroy');
Route::put('/employee/{id}', 'API\Employees\EmployeesController@update');
