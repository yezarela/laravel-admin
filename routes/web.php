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

Route::get('/', function () {
    return view('laravel');
})->name('/');

Route::get('/admin', function () {
   //  if (Auth::guest()) {
   //      return redirect('/');
   //  } else {
   //      if (Auth::user()->isAdmin()) {
   //          return redirect('admin');
   //      } else {
   //          Auth::logout();
   //      }
   //  }
    return view('pages.dashboard');
})->name('admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
