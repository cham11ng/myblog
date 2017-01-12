<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Card
 * @package App
 */
class Card extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['card_title', 'card_slug'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes() {
        return $this->hasMany(Note::class, 'card_id', 'card_id');
    }

    /**
     * @param Note $note
     * @return Model
     */
    public function addNote(Note $note) {
        return $this->notes()->save($note);
    }
}
