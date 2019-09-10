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

Auth::routes();

Route::get('/','HomeController@index');

Route::get('/home', 'HomeController@index');
Route::get('/sondages/{lien}', 'HomeController@sondages');

Route::redirect('/administration','/administration/accueil');
Route::get('/administration/accueil', 'AdminController@index');
Route::get('/administration/questionnaires', 'AdminController@questionnaires');
Route::get('/administration/reponses', 'AdminController@reponses');

Route::post('homeStore', 'HomeController@store');



