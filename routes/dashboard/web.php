<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','auto_check_permission'])->group(function () {

        //=============================== Dashboard ======================================//
        Route::get('/index', 'WelcomeController@index')->name('welcome');

        /**************************** Users & Roles *******************************/
        Route::resource('users', 'UserController');
        Route::get('/users/profile/{id}', 'UserController@showProfile')->name('users.showProfile');
        Route::patch('/users/profile/{id}', 'UserController@profile')->name('users.profile');
        Route::resource('roles', 'RoleController');

        //=============================== Dashboard ======================================//
        Route::resource('/settings', 'SettingController');

    });

});
