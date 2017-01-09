<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function getHome() {
        return view('pages.home');
    }

    public function getAbout() {
		$languages = ['C Programming', 'C++ Programming', 'PHP Programming'];
        return view('pages.about', compact('languages'));
    }
}
