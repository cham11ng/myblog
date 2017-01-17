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
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * @param Note $note
     * @return Model
     */
    public function addNote(Note $note, $userId)
    {
        $note->user_id = $userId;
        return $this->notes()->save($note);
    }
}
