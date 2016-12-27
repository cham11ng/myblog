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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cham11ng', function() {
   return view('pages.cham11ng'); // resources/views/pages/cham11ng.blade.php
});

Route::get('/programming', function () {
    $languages = ['C Programming', 'C++ Programming', 'PHP Programming'];
    //$languages = [];
    return view('pages.programming', compact('languages'));
});