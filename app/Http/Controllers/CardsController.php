<?php

namespace App\Http\Controllers;

use App\Card;

class CardsController extends Controller
{
    public function getCards() {
        $cards = Card::all();
        return view('cards.cards', compact('cards'));
    }

    public function showCard($card_slug) {
        $card = Card::where('card_slug', '=', $card_slug)->first();
        //return $card; // json
        return view('cards.notes', compact('card'));
    }
}
