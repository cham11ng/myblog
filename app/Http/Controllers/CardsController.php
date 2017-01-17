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
    public function getCards() {
        $cards = Card::all();
        return view('cards.cards', compact('cards'));
    }

    /**
     * @param $card_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Showing notes that belongs to $card_slug
     */
    public function showNotes($card_slug) {
        $card = Card::where('card_slug', '=', $card_slug)->first();
        $card->load('notes.user');
        //return $card; // json
        return view('notes.notes', compact('card'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Create new Card
     */
    public function storeCard(Request $request) {
        Card::create([
            'card_title'    => $request->card_title,
            'card_slug'     => str_slug($request->card_title, '-')
        ]);

        return back();
    }

    /**
     * @param $card_slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Edit Card view that belongs to $card_slug
     */
    public function editCard($card_slug) {
        $card = Card::where('card_slug', '=', $card_slug)->first();

        return view('cards.edit_card', compact('card'));
    }

    /**
     * @param Request $request
     * @param $card_slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * Card Update Patch
     */
    public function updateCard(Request $request, $card_slug) {
        Card::where('card_slug', '=', $card_slug)
            ->update([
                'card_title'    => $request->card_title,
                'card_slug'     => str_slug($request->card_title)
            ]);

        return redirect('/card/'.str_slug($request->card_title).'/edit');
    }

    /**
     * @param $card_slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCard($card_slug) {
        Card::where('card_slug', '=', $card_slug)
            ->delete();

        return back();
    }
}
