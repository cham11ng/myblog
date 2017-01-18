<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

/**
 * Class CardsController
 * @package App\Http\Controllers
 */
class CardsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Listing all cards to view
     */
    public function getCards()
    {
        $cards = Card::all();
        return view('cards.cards', compact('cards'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Showing notes that belongs to $slug
     */
    public function showNotes($slug)
    {
        $card = Card::where('slug', '=', $slug)->first();
        $card->load('notes.user');
        //return $card; // json
        return view('notes.notes', compact('card'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Create new Card
     */
    public function storeCard(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required|min:2|unique:cards,title'
        ]);

        Card::create([
            'title'    => $request->title,
            'slug'     => str_slug($request->title, '-')
        ]);

        return back();
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Edit Card view that belongs to $slug
     */
    public function editCard($slug)
    {
        $card = Card::where('slug', '=', $slug)->first();

        return view('cards.edit_card', compact('card'));
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Card Update Patch
     */
    public function updateCard(Request $request, $slug)
    {
        Card::where('slug', '=', $slug)
            ->update([
                'title'    => $request->title,
                'slug'     => str_slug($request->title)
            ]);

        return redirect('/card/'.str_slug($request->title).'/edit');
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCard($slug)
    {
        /*Card::where('slug', '=', $slug)
            ->delete();*/

        $card = Card::where('slug', '=', $slug)->first();

        $card->delete();
        $card->deleteNotes();   // delete all notes of respective card

        return back();
    }
}
