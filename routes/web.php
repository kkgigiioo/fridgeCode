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

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', 'FirebaseController@index')->name('home');

Route::get('/register', function () {
    return view('register');
});

Route::post('/login', 'FirebaseController@logIn');
Route::post('/register', 'FirebaseController@reg');
/*
Route::post('/login', 'FirebaseController@logInGoogle');
Route::post('/login', 'FirebaseController@logInFacebook');
Route::post('/login', 'FirebaseController@logInTwitter');
*/