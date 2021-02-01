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

Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');

Route::get('/post', 'PagesController@getPost($id)');

Route::get('/contacts', 'ContactController@index')->name('contacts.index')->middleware('auth');

Route::post('/contacts', 'ContactController@store')->name('contacts.store')->middleware('auth');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create')->middleware('auth');

Route::get('/', 'PostController@index')->name('index');

Route::get('/settings/account', 'Settings\AccountController@index');

Auth::routes(['verify' => true]);

Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show')->middleware('auth');

Route::put('/contacts/{id}', 'ContactController@update')->name('contacts.update')->middleware('auth');

Route::get('/contacts/{id}/edit', 'ContactController@edit')->name('contacts.edit')->middleware('auth');

Route::delete('/contacts/{id}', 'ContactController@destroy')->name('contacts.destroy')->middleware('auth');

Route::resource('posts','PostController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
