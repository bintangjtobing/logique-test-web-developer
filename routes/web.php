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

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/sign-out', function () {
    session()->flush();
    return redirect('/');
});
Route::post('/login', 'authController@processLogin');
Route::get('/register', 'authController@register');
Route::post('/register', 'authController@processRegister');
Route::group(['middleware' => ['isLogin']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('homepage');
});
