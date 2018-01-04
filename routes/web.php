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

// 手机
Route::get('/', 'Mobile\IndexController@index');



// 后台
Route::prefix('admin')->get('/', 'Admin\LoginController@login');
Route::prefix('admin')->get('/login', 'Admin\LoginController@login');



Route::prefix('admin')->get('/index', 'Admin\IndexController@index');

Route::prefix('admin')->get('/user-list', 'Admin\UserController@index');


Route::prefix('admin')->get('/article-list', 'Admin\ArticleController@index');

Route::prefix('admin')->get('/article-insert', 'Admin\ArticleController@articleInsert');


Route::prefix('admin')->get('/type-list', 'Admin\TypeController@articleTypeList');
Route::prefix('admin')->get('/type-insert', 'Admin\TypeController@articleTypeInsert');
