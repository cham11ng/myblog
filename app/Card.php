<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['card_title', 'card_slug'];
    public function notes() {
        return $this->hasMany(Note::class, 'card_id', 'card_id');
    }

    public function addNote(Note $note) {
        return $this->notes()->save($note);
    }
}
