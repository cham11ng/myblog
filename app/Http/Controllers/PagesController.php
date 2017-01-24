<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHome()
    {
        return view('pages.home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAbout()
    {
		$languages = ['C Programming', 'C++ Programming', 'PHP Programming'];
        return view('pages.about', compact('languages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        return view('pages.contact');
    }
}
