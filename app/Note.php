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
    protected $fillable = ['note_content', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function card() {
        return $this->belongsTo(Card::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}