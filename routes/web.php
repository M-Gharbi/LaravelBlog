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

//Route::get('/', 'PagesController@getIndex');

Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');

Route::get('/contacts', 'PagesController@getContacts');


Route::get('/post', 'PagesController@getPost($id)');

/*Route::get('/contacts', function () {
    return "<h1>All contacts</h1>";
})->name('contacts.index');*/
Route::get('/contacts', 'ContactController@index')->name('contacts.index');
Route::get('/', 'PostController@index')->name('index');


Route::get('/contacts/create', function () {
    return "<h1>Add new contact</h1>";
})->name('contacts.create');



Route::get('/contacts/{id}', 'ContactController@show')->name('contacts.show');

//Route::resource('contacts','PostController');
Route::resource('posts','PostController');