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

Route::get('/', 'EmployeeController@show');
Route::get('add-employee', 'EmployeeController@addEmployee');
Route::get('edit-employee/{id}', 'EmployeeController@editEmployee');

Route::delete('delete-employee', 'EmployeeController@deleteEmployee');

Route::post('save-employee/{id?}', 'EmployeeController@store');
Route::post('change-status', 'EmployeeController@changeStatus');
Route::post('fetch-all-employees', 'EmployeeController@fetchAllEmployees');
