<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'ISBN_no', 'authorfirstname', 'authorlastname'];
}
