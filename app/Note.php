<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['note_content'];

    public function card() {
        return $this->belongsTo(Card::class, 'card_id', 'card_id');
    }
}