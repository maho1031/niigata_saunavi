<?php

use Illuminate\Support\Facades\Auth;

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




Route::get('/', 'HomeController@index')->name('home');

// サウナ一覧
Route::get('/saunas', 'SaunasController@index')->name('sauna.index');
// サウナ詳細画面
Route::get('/saunas/show/{sauna_id}', 'SaunasController@show')->name('sauna.show');


Route::group(['middleware' => 'auth'], function() {


    // マイページ画面
    Route::get('/users', 'UsersController@index')->name('user.index');
    // ユーザー情報画面
    Route::get('/users/show', 'UsersController@show')->name('user.show');
    // ユーザー情報編集画面
    Route::get('/users/edit', 'UsersController@edit')->name('user.edit');
    // ユーザー情報更新
    Route::post('/users/update', 'UsersController@update')->name('user.update');
    // ユーザー退会
    Route::get('/users/withDrawal', 'UsersController@withDrawal')->name('user.withDraw');

    Route::post('/users/destroy', 'UsersController@destroy')->name('user.destroy');


    // サウナ一覧
    // Route::get('/saunas', 'SaunasController@index')->name('sauna.index');
    // サウナ新規登録画面
    Route::get('/saunas/create', 'SaunasController@create')->name('sauna.create');
    // サウナ新規登録
    Route::post('/saunas/store', 'SaunasController@store')->name('sauna.store');
    // サウナ詳細画面
    // Route::get('/saunas/show/{sauna_id}', 'SaunasController@show')->name('sauna.show');
    // サウナ編集画面
    Route::get('/saunas/edit/{sauna_id}', 'SaunasController@edit')->name('sauna.edit');
    // サウナ更新
    Route::post('/saunas/update/{sauna_id}', 'SaunasController@update')->name('sauna.update');
     // サウナ削除
    Route::post('/saunas/destroy/{sauna_id}', 'SaunasController@destroy')->name('sauna.destroy');
    // サウナレビュー
    Route::post('/saunas/show/', 'SaunasController@review')->name('sauna.review');

});

Auth::routes();
