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

/*Route::get('/contacts', 'ContactController@index')->name('contacts.index');

Route::post('/contacts', 'ContactController@store')->name('contacts.store');

Route::get('/contacts/create', 'ContactController@create')->name('contacts.create');

Route::get('/contacts/{contact}', 'ContactController@show')->name('contacts.show');

Route::put('/contacts/{contact}', 'ContactController@update')->name('contacts.update');

Route::get('/contacts/{contact}/edit', 'ContactController@edit')->name('contacts.edit');

Route::delete('/contacts/{contact}', 'ContactController@destroy')->name('contacts.destroy');*/

//Route::resource('contacts','ContactController');

// Route::resource('/contacts', 'ContactController')->only(['create', 'store', 'edit', 'update', 'destroy']);

// Route::resource('/contacts', 'ContactController')->except(['index', 'show']);

//Route::apiResource('/contacts','ContactController');

// Route::resource('/contacts', 'ContactController')->parameters([
//     'contacts' => 'kontak',
// ]);
// Route::resource('/contacts', 'ContactController')->names([
//     'index' => 'contacts.all',
//     'show' => 'contacts.view'
// ]);
// Route::resource('/companies.contacts', 'ContactController');
// Route::resource('/contacts', 'ContactController')->only(['create', 'store', 'edit', 'update', 'destroy']);
// Route::resource('/contacts', 'ContactController')->except(['index', 'show']);


Route::resources([
    '/contacts' => 'ContactController',
    '/posts' => 'PostController',
]);


Route::get('/', 'PostController@index')->name('index');

Route::get('/settings/account', 'Settings\AccountController@index');

Auth::routes(['verify' => true]);



//Route::resource('posts','PostController');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
