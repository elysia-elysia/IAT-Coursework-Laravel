<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    protected $fillable = ['book_id','filename'];

    public function bookImage()
    {
        return $this->belongsTo('App\Book');
    }
}
