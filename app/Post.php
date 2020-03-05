<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //protected $fillable = ['user_id', 'title', 'body', 'image'];
    protected $fillable = ['user_id', 'h1', 'intro', 'timetable'];
}
