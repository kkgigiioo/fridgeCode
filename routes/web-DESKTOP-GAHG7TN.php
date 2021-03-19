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
Route::get('/home/{id}', 'HomeController@show')->name('product');
Route::get('/home/recipe/search', 'HomeController@search')->name('recipeSearch');

Route::get('/recipe', 'RecipeController@apis')->name('recipe');
Route::get('/recipe/{id}', 'RecipeController@show')->name('oneRecipe');