<?php

namespace App\Models;

// We only allow users to change the content field. At the same time,
// do the association of the data model, one reply belongs to one topic,
// and one reply belongs to one author.

class Reply extends Model
{
    protected $fillable = ['content'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
