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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/excel', 'ExcelController@index');
Route::get('/word', 'ExcelController@word');

Route::resource('file', 'FileController');

Route::resource('form', 'FormController');

Route::resource('type', 'TypeController');

Route::get('/listview/{id}', 'FormController@listview');
Route::get('/statuslist', 'FormController@statusList');

// เลือกจังหวัด json
Route::get('/getProvince', 'FormController@getProvince');
Route::get('/getDistrict/{province}', 'FormController@getDistrict')->where(['province' => '[0-9]+']);
Route::get('/getSubDistrict/{district}', 'FormController@getSubDistrict')->where(['district' => '[0-9]+']);

Route::get('/boot', 'FormController@boot');
Route::get('/getFile', 'FormController@getFile');
Route::get('/user', 'FormController@getAPI');
