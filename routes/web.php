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

Route::group(['middleware' => 'auth',  'as' => 'cartao.', 'prefix' => 'cartao' ], function (){
    Route::any('home',         ['as' => 'index',   'uses' => 'CartaoController@index']);
    Route::get('create',       ['as' => 'create',  'uses' => 'CartaoController@create']);
    Route::post('store',       ['as' => 'store',   'uses' => 'CartaoController@store']);
    Route::get('{id}/restore', ['as' => 'restore', 'uses' => 'CartaoController@restore']);
    Route::get('geraPdf',      ['as' => 'geraPdf', 'uses' => 'CartaoController@geraPdfCartao']);
});

