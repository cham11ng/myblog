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
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * Adding Notes to Card identified by $slug
     */
    public function storeNote(Request $request, $slug)
    {
        $card = Card::where('slug', '=', $slug)->first();

        /**
         * Implicit Method
         */
        /*$card->notes()->create([
            'body'  => $request->body
        ]);*/

        /**
         * Explicit Method
         */
        $this->validate($request, [
            'body'   => 'required|min:10'
        ]);

        $note = new Note($request->all());
        
        $card->addNote($note, 1);

        return back();
    }

    /**
     * @param Note $note
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * EditNote identified by $id View Page
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
        $this->validate($request, [
            'body'   => 'required|min:10'
        ]);

        $note->update($request->all());

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