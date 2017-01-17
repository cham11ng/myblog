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
    public function storeNote(Request $request, $card_slug)
    {
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
        $note = new Note([
            'note_content'  => $request->note_content,
        ]);
        $card->addNote($note, 1);

        return back();
    }

    /**
     * @param Note $note
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * EditNote identified by$note_id View Page
     */
    public function editNote(Note $note)
    {
        $note->first()->load('card');

        return view('notes.edit_note', compact('note'));
    }

    /**
     * @param Request $request
     * @param Note $note
     * @return \Illuminate\Http\RedirectResponse
     * Notes Update Patch
     */
    public function updateNote(Request $request, Note $note)
    {
        $note->update([
                'note_content'  => $request->note_content
            ]);

        return back();
    }

    /**
     * @param Note $note
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteNote(Note $note)
    {
        $note->delete();

        return back();
    }
}