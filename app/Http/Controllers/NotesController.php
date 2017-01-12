<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Card;

/**
 * Class NotesController
 * @package App\Http\Controllers
 */
class NotesController extends Controller
{
    /**
     * @param Request $request
     * @param $card_slug
     * @return \Illuminate\Http\RedirectResponse
     * Adding Notes to Card identified by $card_slug
     */
    public function storeNote(Request $request, $card_slug) {
        $card = Card::where('card_slug', '=', $card_slug)->first();

        /**
         * Implicit Method
         */
        /*$card->notes()->create([
            'note_content'  => $request->note_content
        ]);*/

        /**
         * Explicit Method
         */
        $card->addNote(new Note([
            'note_content' => $request->note_content
        ]));

        return back();
    }

    /**
     * @param $note_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * EditNote identified by$note_id View Page
     */
    public function editNote($note_id) {
        $note = Note::where('note_id', '=', $note_id)->with('card')->first();

        return view('notes.edit_note', compact('note'));
    }

    /**
     * @param Request $request
     * @param $note_id
     * @return \Illuminate\Http\RedirectResponse
     * Notes Update Patch
     */
    public function updateNote(Request $request, $note_id) {
        Note::where('note_id', '=', $note_id)
            ->update(['note_content' => $request->note_content]);

        return back();
    }

    /**
     * @param $note_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteNote($note_id) {
        Note::where('note_id', '', $note_id)
            ->delete();

        return back();
    }
}
