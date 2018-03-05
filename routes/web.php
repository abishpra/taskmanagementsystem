<?php

Route::group(['namespace'=>'Front'],function (){
    Route::get('/','AppController@index');
    Route::get('about','AppController@about');

    Route::get('register','AppController@register')->name('register');
    Route::post('register','AppController@registerAction');
});

Route::group(['namespace'=>'Back'],function (){
    Route::get('login','UserController@login')->name('login');
    Route::post('login','UserController@loginAction');
});

Route::group(['namespace'=>'Back', 'prefix' => 'admin', 'middleware'=>['auth','role:admin']],function () {
    Route::get('dashboard', 'DashBoardController@index')->name('dashboard');

    Route::get('user', 'UserController@user')->name('admin-user');

    Route::get('createTask','UserController@task')->name('task');
    Route::post('createTask','UserController@taskAction');
    Route::get('/','UserController@showTask')->name('admin-task');

    Route::get('add','UserController@index')->name('add');
    Route::post('add','UserController@userAction');

    Route::get('updateStatus','UserController@user')->name('updateStatus');
    Route::post('updateStatus','UserController@updateUserStatus');

    Route::get('createPool','UserController@pool')->name('pool');
    Route::post('createPool','UserController@poolAction');

    Route::get('showPool','UserController@showPool')->name('show-pool');

    Route::get('delete/{id}','UserController@delete')->name('delete');

});

Route::group(['namespace'=>'Back','prefix' => 'user', 'middleware'=>['auth','role:user']],function () {
    Route::get('userDashboard', 'DashBoardController@user')->name('user-dashboard');

    Route::get('cancel/{id}','UserController@cancel')->name('cancel');

    Route::get('accept/{id}','UserController@accept')->name('accept');

    Route::get('complete/{id}','UserController@complete')->name('complete');

});

Route::group(['namespace'=>'Back','middleware'=>'auth'],function (){
    Route::get('setting','UserController@setting')->name('setting');
    Route::post('setting','UserController@settingAction');


    Route::post('change-password','UserController@changePassword')->name('change-password');

    Route::get('info/{id}','DashBoardController@content');

    Route::get('profile','UserController@profile')->name('profile');

    Route::get('download/{id}','UserController@download')->name('download');
});


Route::group(['namespace'=>'Back','prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('login','UserController@logOut')->name('logout');

});


