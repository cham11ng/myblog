<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home() {
        return view('pages.home');
    }

    public function about() {
		$languages = ['C Programming', 'C++ Programming', 'PHP Programming'];
        return view('pages.about', compact('languages'));
    }
}
