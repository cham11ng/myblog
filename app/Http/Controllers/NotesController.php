<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Card;

class NotesController extends Controller
{
    public function storeNote(Request $request, $card_slug) {
        $card = Card::where('card_slug', '=', $card_slug)->first();

        $card->notes()->create([
            'note_content'  => $request->note_content
        ]);

        //$card->addNote(new Note($request->all()));

        return back();
    }
}
