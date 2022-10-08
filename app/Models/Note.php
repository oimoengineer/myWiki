<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'word',
        'description',
        'user_id',
        'url',
    ];


    //relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //user_id
    protected static function boot()
    {
        parent::boot();

        self::saving(function($note) {
            $note->user_id = \Auth::id();
        });
    }
}
