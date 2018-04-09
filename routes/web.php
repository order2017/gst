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
Route::group(['namespace' => 'Mobile'],function (){

    // 首页
    Route::get('/', 'IndexController@index');

    // 登录
    Route::get('/user-login','UserController@login');
    Route::post('/user-login','UserController@loginStore');

    // 注册
    Route::get('/user-register','UserController@register');
    Route::post('/user-register','UserController@registerSubmit');

    // 发送验证码
    Route::post('/send','UserController@Send');

    // 商业
    Route::get('/index-sy', 'IndexController@indexSy');
    // 商超
    Route::get('/index-sc', 'IndexController@indexSc');

    // 文章视图
    Route::get('/article-view', 'ArticleController@view');

    //----------
    // 商业详细
    Route::get('/details-xx', 'IndexController@indexXx');
    // 商超详细
    Route::get('/details-sc', 'IndexController@indexS');

    // 文章列表
    Route::get('/article-list', 'ArticleController@index');

    // 文章详细
    Route::get('/article-details', 'ArticleController@details');

    Route::group(['middleware' => 'mobile.login'],function (){

        // 用户中心
        Route::get('/user-index', 'UserController@userIndex');

        // 用户个人微信二维码
        Route::get('/user-qrcode', 'UserController@userQrcode');

        // 用户修改密码
        Route::get('/user-password', 'UserController@userPassword');
        Route::post('/user-password', 'UserController@userPasswordStore');

        // 用户发布
        Route::get('/user-push','UserController@userPush');
        Route::post('/user-push','UserController@userPushStore');

        // 用户退出
        Route::get('/logout', 'UserController@logout');

    });

});


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

        // 用户编辑
        Route::get('/user-edit/{user_id}', 'UserController@userEdit');
        Route::post('/user-edit', 'UserController@userEditStore');
        // 用户删除
        Route::get('/user-delete/{user_id}', 'UserController@userEditDel');

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
