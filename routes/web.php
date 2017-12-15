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

Route::get('/', 'PagesController@home');
Route::get('/choose', 'PagesController@choose');
Route::get('/create', 'PagesController@create');
Route::post('/presentation', 'PagesController@presentation');

//File Handling
Route::post('/store', 'StorageController@store');
Route::get('/uploads/{fileName}', 'StorageController@show');

//Send Email
Route::post('/send', 'MailController@sendCard');
Route::get('/subscribe', 'SubscriberController@store');

//Social Login
Route::get('/facebook/login', 'SocialAuthController@fbLoginUrl');
Route::get('/facebook/callback', 'SocialAuthController@fbLoginCallback');
Route::get('/facebook/post-preview', 'SocialAuthController@fbPostPreview');
Route::post('/facebook/post', 'SocialAuthController@fbPost');