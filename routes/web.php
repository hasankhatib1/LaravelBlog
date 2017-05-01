<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {return view('welcome'); }) ;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get', 'post'],'/ajoutArticle', 'gestionArticlesController@ajoutArticle');

Route::get('/liste', 'gestionArticlesController@liste') ;

Route::get('liste/{id}', 'gestionArticlesController@supprimer');

Route::match(['get', 'post'],'modifier/{id}', 'gestionArticlesController@modifier');

Route::match(['get', 'post'],'/lire/{id}', 'gestionArticlesController@lire') ;
