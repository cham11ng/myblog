<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home() {
        $languages = ['C Programming', 'C++ Programming', 'PHP Programming'];
        return view('pages.programming', compact('languages'));
    }

    public function cham11ng() {
        return view('pages.cham11ng');
    }
}
