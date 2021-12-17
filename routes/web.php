<?php

use Illuminate\Support\Facades\Route;

// ========================= Authetication ======================================
Route::group(['prefix' => '/', 'namespace' => 'Auth'], function () {
    Route::group(['prefix' => 'auth', 'middleware' => 'CheckLoggedIn'], function () {
        Route::match(['POST', 'GET'], '/login', 'AuthController@login')->name("auth.login");
        Route::post('/login/action', 'AuthController@action')->name("auth.login.action");
    });
    Route::match(['POST', 'GET'], '/logout', 'AuthController@logout')->name("auth.logout");
});

// ========================= ADMIN ======================================
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'CheckLoggedOut'], function() {

    // ========================= Dashboard ======================================
    Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {

    });

    // ========================= Quản Lý Quảng Cáo ======================================
    Route::group(['prefix' => 'quang-cao', 'namespace' => 'Slider'], function () {

        Route::get('/', 'IndexController@index')->name('admin.slider');

        Route::get('/add', 'AddController@add')->name('admin.slider.add');

        Route::post('/add/action', 'AddController@action')->name('admin.slider.add.action');

        Route::get('/edit/{id}', 'EditController@edit')->name('admin.slider.edit')->where('id','[0-9]+');

        Route::post('/edit/action', 'EditController@action')->name('admin.slider.edit.action');

        Route::post('/delete', 'IndexController@delete')->name('admin.slider.delete');

        Route::get('change-status-{status}/{id}','IndexController@changeStatus')->name('admin.slider.changeStatus')->where('id','[0-9]+');

    });

    // ========================= Quản Lý Danh Mục ======================================
    Route::group(['prefix' => 'danh-muc', 'namespace' => 'Category'], function () {

        Route::get('/', 'IndexController@index')->name('admin.category');

        Route::get('/add', 'AddController@add')->name('admin.category.add');

        Route::post('/add/action', 'AddController@action')->name('admin.category.add.action');

        Route::get('/edit/{id}', 'EditController@edit')->name('admin.category.edit')->where('id','[0-9]+');

        Route::post('/edit/action', 'EditController@action')->name('admin.category.edit.action');

        Route::post('/delete', 'IndexController@delete')->name('admin.category.delete');

        Route::get('change-status-{status}/{id}','IndexController@changeStatus')->name('admin.category.changeStatus')->where('id','[0-9]+');

        Route::get('change-is-home-{isHome}/{id}','IndexController@isHome')->name('admin.category.isHome')->where('id','[0-9]+');

        Route::get('change-display-{display}/{id}','IndexController@display')->name('admin.category.display')->where('id','[0-9]+');

    });

    // ========================= Quản Lý Bài Viết ======================================
    Route::group(['prefix' => 'bai-viet', 'namespace' => 'Article'], function () {

        Route::get('/', 'IndexController@index')->name('admin.article');

        Route::get('/add', 'AddController@add')->name('admin.article.add');

        Route::post('/add/action', 'AddController@action')->name('admin.article.add.action');

        Route::get('/edit/{id}', 'EditController@edit')->name('admin.article.edit')->where('id','[0-9]+');

        Route::post('/edit/action', 'EditController@action')->name('admin.article.edit.action');

        Route::post('/delete', 'IndexController@delete')->name('admin.article.delete');

        Route::get('change-status-{status}/{id}','IndexController@changeStatus')->name('admin.article.changeStatus')->where('id','[0-9]+');

        Route::get('change-type-{type}/{id}','IndexController@type')->name('admin.article.type')->where('id','[0-9]+');

    });

    // ========================= Quản Lý Người Dùng ======================================
    Route::group(['prefix' => 'nguoi-dung', 'namespace' => 'User'], function () {

        Route::get('/', 'IndexController@index')->name('admin.user');

        Route::get('/add', 'AddController@add')->name('admin.user.add');

        Route::post('/add/action', 'AddController@action')->name('admin.user.add.action');

        Route::get('/edit/{id}', 'EditController@edit')->name('admin.user.edit')->where('id','[0-9]+');

        Route::post('/edit/action', 'EditController@action')->name('admin.user.edit.action');

        Route::post('/edit/change-password', 'EditController@changePassword')->name('admin.user.edit.changePassword');

        Route::post('/edit/change-level', 'EditController@changeLevel')->name('admin.user.edit.changeLevel');

        Route::post('/delete', 'IndexController@delete')->name('admin.user.delete');

        Route::get('change-status-{status}/{id}','IndexController@changeStatus')->name('admin.user.changeStatus')->where('id','[0-9]+');

        Route::get('change-type-{level}/{id}','IndexController@level')->name('admin.user.level')->where('id','[0-9]+');

    });

});
