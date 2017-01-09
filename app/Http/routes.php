<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@getHome');

Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');

Route::get('/empty', function () {
    $languages = [];
    return view('pages.about', compact('languages'));
});

Route::get('cards', 'CardsController@getCards');

Route::get('card/{card_slug}', 'CardsController@showCard');

Route::get('error', function () {
    return view('errors.503');
});