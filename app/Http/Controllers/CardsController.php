<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function getCards() {
        $cards = Card::all();
        return view('cards.cards', compact('cards'));
    }

    public function showCard($card_slug) {
        $card = Card::where('card_slug', '=', $card_slug)->first();
        //return $card; // json
        return view('notes.notes', compact('card'));
    }

    public function storeCard(Request $request) {
        Card::create([
            'card_title'    => $request->card_title,
            'card_slug'     => str_slug($request->card_title, '-')
        ]);

        return back();
    }
}
