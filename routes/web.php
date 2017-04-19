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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('register/confirm/{token}', '\App\Http\Controllers\Auth\RegisterController@confirmEmail');

Route::group(['prefix' => 'user'], function(){
    Route::get('liste', 'UserController@listUser')->name('list.user');
    Route::get('{id}/desable', 'UserController@desableUser')->name('desable.user');
    Route::get('{id}/enable', 'UserController@enableUser')->name('enable.user');
    Route::get('{id}/delete', 'UserController@deleteUser')->name('delete.user');
    Route::get('{id}/edit', 'UserController@editUser')->name('edit.user');
    Route::post('{id}/update', 'UserController@updateUser')->name('update.user');

    //admin
    Route::get('{id}/add-admin', 'UserController@addAdmin')->name('add.admin');
    Route::get('{id}/delete-admin', 'UserController@delAdmin')->name('delete.admin');
});

Route::group(['prefix' => 'groupe'], function (){
    Route::get('add', 'GroupController@add')->name('add.group');
    Route::get('liste', 'GroupController@liste')->name('list.group');
    Route::post('create', 'GroupController@create')->name('create.group');
    Route::get('{id}/desable', 'GroupController@desable')->name('desable.group');
    Route::get('{id}/enable', 'GroupController@enable')->name('enable.group');
    Route::get('{id}/delete', 'GroupController@delete')->name('delete.group');
    Route::get('{id}/edit', 'GroupController@edit')->name('edit.group');
    Route::post('{id}/update', 'GroupController@update')->name('update.group');
    Route::get('{id}/contact-list', 'GroupController@groupContact')->name('groupe.contact');
    Route::get('{contact_id}/contact/{groupe_id}/group/delete', 'GroupController@deleteOnGroupe')->name('delete.contact.group');
    Route::post('{id}/add-contact-in-group', 'GroupController@addContactInGroup')->name('add.contact.in.group');
});

Route::group(['prefix' => 'contact'], function (){
    Route::get('add', 'ContactController@add')->name('add.contact');
    Route::get('liste', 'ContactController@liste')->name('list.contact');
    Route::post('create', 'ContactController@create')->name('create.contact');
    Route::get('{id}/delete', 'ContactController@delete')->name('delete.contact');
    Route::get('{id}/edit', 'ContactController@edit')->name('edit.contact');
    Route::post('{id}/update', 'ContactController@update')->name('update.contact');
    Route::post('{id}/choose-contact-group', 'ContactController@chooseContactGroup')->name('choose.contact.group');
});


