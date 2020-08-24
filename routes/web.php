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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomepageController@view');

Route::get('/create', 'UserController@createUserView');
Route::post('/create/submit', 'UserController@createUser');

Route::get('/update/{id}', 'UserController@updateUserView');
Route::post('/update/{id}/submit', 'UserController@updateUser');

Route::post('/delete/{id}', 'UserController@deleteUser');
