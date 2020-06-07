<?php

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes(); //vendor/laravel/framework/src/Illuminate/Routing/Router.php
    // Authentication Routes...
    $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
    $this->post('login', 'Auth\LoginController@login');
    $this->post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'Auth\RegisterController@register');

    //// Password Reset Routes...
    // $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // $this->post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| END Auth Routes
|--------------------------------------------------------------------------
*/



Route::get('/', function () {
    return view('registro.home');
});

Route::get('/cadastro_de_missionario',              'RegisterMissionaryController@create')->name('cadastro_de_missionario_form');
Route::get('/cadastro_de_missionario/edit/{m_id}',  'RegisterMissionaryController@show')->name('cadastro_de_missionario_edit');
Route::post('/cadastro_de_missionario/store',       'RegisterMissionaryController@store')->name('cadastro_de_missionario_store');
Route::post('/cadastro_de_missionario/update',      'RegisterMissionaryController@update')->name('cadastro_de_missionario_update');
Route::post('/cadastro_de_missionario/delete',      'RegisterMissionaryController@destroy')->name('cadastro_de_missionario_delete');

Route::get('/pt', function(){ return view('registro/pages/pt_br'); });
Route::get('/map', function(){ return view('registro/pages/map'); })->name('page_map');
Route::get('/search', function(){ return view('registro/pages/search'); })->name('page_search');


Route::get('/home', 'HomeController@index')->name('home');
