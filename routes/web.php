<?php

use Illuminate\Support\Facades\Route;

Route::get('/language/{lang}', function ($lang) {

    session()->put('locale', $lang);
    return redirect()->back();

})->name('change-language');

Route::group(['namespace' => 'Auth' , 'middleware' => 'set_locale'] , function () {

    // employee login routes
    Route::get('employee/login','EmployeeAuthController@showLoginForm')->name('employee.login-form');
    Route::get('employee/forgot-password','EmployeeAuthController@showForgotPasswordForm')->name('employee.forgot-password-form');
    Route::get('employee/new-password','EmployeeAuthController@showNewPasswordForm')->name('employee.new-password-form');

    Route::post('employee/login','EmployeeAuthController@login')->name('employee.login');
    Route::post('employee/logout','EmployeeAuthController@logout')->name('employee.logout');

    // user login routes
    Route::get('employee/login','EmployeeAuthController@showLoginForm')->name('employee.login-form');

});


Route::group(['namespace' => 'Home' , 'middleware' => 'set_locale'] , function () {

    // Route::get('/','HomeController@index')->name('home.index');

});

Route::get('test',function(){
    dd(array_diff([1,3,4],[1]));
    dd(App\Models\MainAnalysis::first()->subAnalysis);
});

Route::get('update', function () {

    Artisan::call('migrate:fresh');
    Artisan::call('db:seed');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    Artisan::call('optimize:clear');
//    Artisan::call('storage:link');

    dd('done');

});
