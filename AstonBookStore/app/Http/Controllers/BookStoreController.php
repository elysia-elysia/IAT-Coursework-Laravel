<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookStoreController extends Controller
{
    public function showBookByID($id){
        $book = Book::find($id);
        return view('/book', array('book'=> $book));
    }

    public function showAllBooks(){
        return view('/all-books', array('books'=>Book::all()));
    }
}
