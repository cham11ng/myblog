<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Card
 * @package App
 */
class Card extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var array
     */
    protected $fillable = ['title', 'slug'];

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
    public function addNote(Note $note)
    {
        $note->user_id = Auth::id();
        return $this->notes()->save($note);
    }

    public function deleteNotes()
    {
        return $this->notes()->delete();
    }
}
