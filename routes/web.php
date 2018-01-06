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
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function (){

    // 用户登录
    Route::get('/', 'LoginController@login');
    Route::get('/login', 'LoginController@login');
    Route::post('/login', 'LoginController@loginStore');

    Route::group(['middleware' => 'admin.login'],function (){

        // 后台首页
        Route::get('/index', 'IndexController@index');

        // 用户列表
        Route::get('/user-list', 'UserController@index');

        // 文章列表
        Route::get('/article-list', 'ArticleController@index');
        // 文章添加
        Route::get('/article-insert', 'ArticleController@articleInsert');
        Route::post('/article-insert', 'ArticleController@articleInsertStore');

        // 类别列表
        Route::get('/type-list', 'TypeController@articleTypeList');
        // 类别添加
        Route::get('/type-insert', 'TypeController@articleTypeInsert');
        Route::post('/type-insert', 'TypeController@articleTypeInsertStore');

        // 类别更新
        Route::get('/type-update', 'TypeController@articleTypeInsertUpdate');
        Route::post('/type-update', 'TypeController@articleTypeInsertUpdateStore');

        // 用户退出
        Route::get('/logout', 'LoginController@logout');

    });

});
