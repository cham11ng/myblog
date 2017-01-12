<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Note
 * @package App
 */
class Note extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['note_content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card() {
        return $this->belongsTo(Card::class, 'card_id', 'card_id');
    }
}