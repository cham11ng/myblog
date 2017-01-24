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

/**
 * Pages Controller
 */
Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');

/**
 * CardsController
 */
Route::get('/cards', 'CardsController@getCards');
Route::get('/card/{slug}/notes', 'CardsController@showNotes');

Route::post('/card/add_card', 'CardsController@storeCard');

Route::get('/card/{slug}/edit', 'CardsController@editCard');
Route::patch('/card/{slug}', 'CardsController@updateCard');

Route::delete('/card/{slug}/delete', 'CardsController@deleteCard');

Route::post('/card/{slug}/add_note', 'NotesController@storeNote');

/**
 * NotesController
 */
Route::get('/note/{note}/edit', 'NotesController@editNote');
Route::patch('/note/{note}', 'NotesController@updateNote');

Route::delete('/note/{note}/delete', 'NotesController@deleteNote');

Route::auth();

Route::get('/home', 'HomeController@index');
