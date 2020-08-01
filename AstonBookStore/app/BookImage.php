<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    protected $fillable = ['book_id','filename'];

    /**
     * Defining the Eloquent relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookImage()
    {
        return $this->belongsTo('App\Book');
    }
}
