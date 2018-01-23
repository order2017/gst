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

Route::get('/article-list', 'Mobile\ArticleController@index');
Route::get('/article-view', 'Mobile\ArticleController@view');
Route::get('/article-details', 'Mobile\ArticleController@details');



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

        // 文章更新
        Route::get('/article-update/{article_id}', 'ArticleController@articleUpdate');
        Route::post('/article-update', 'ArticleController@articleUpdateStore');

        // 文章删除
        Route::get('/article-delete/{article_id}', 'ArticleController@articleDelete');

        // 类别列表
        Route::get('/type-list', 'TypeController@articleTypeList');
        // 类别添加
        Route::get('/type-insert', 'TypeController@articleTypeInsert');
        Route::post('/type-insert', 'TypeController@articleTypeInsertStore');

        // 类别更新
        Route::get('/type-update', 'TypeController@articleTypeInsertUpdate');
        Route::post('/type-update', 'TypeController@articleTypeInsertUpdateStore');

        // 类别删除
        Route::get('/type-delete/{type_id}','TypeController@articleTypeDelete');

        // 用户退出
        Route::get('/logout', 'LoginController@logout');

    });

});
