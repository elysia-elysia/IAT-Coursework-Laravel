<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class BookController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->toArray();
        return view('books.index', compact('books'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation
        $book = $this->validate(request(), [
            'title' => 'required',
            'ISBN_no' => 'required|max:13|min:13',
            'authorfirstname' => 'required',
            'authorlastname' => 'required',
            'publishyear' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'category' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
//Handles the uploading of the image
        if ($request->hasFile('image')){
//Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
//just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
//Gets the filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
//Uploads the image
            $path =$request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
// create a book object and set its values from the input
        $book = new book;
        $book->title = $request->input('title');
        $book->ISBN_no = $request->input('ISBN_no');
        $book->authorfirstname = $request->input('authorfirstname');
        $book->authorlastname = $request->input('authorlastname');
        $book->publishyear = $request->input('publishyear');
        $book->price = $request->input('price');
        $book->stock = $request->input('stock');
        $book->category = $request->input('category');
        $book->category = implode(',', $book->category);
        $book->description = $request->input('description');
        $book->created_at = now();
        $book->image = $fileNameToStore;
// save the book object
        $book->save();
// generate a redirect HTTP response with a success message
        return back()->with('success', 'The book has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit',compact('book'));
    }

    public function addToBasket($id)
    {
        $book = Book::find($id);
        //TODO: Add to basket function
       // return redirect('books')->with('success','The book has been added to your basket');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        // form validation
        $this->validate(request(), [
            'title' => 'required',
            'ISBN_no' => 'required|max:13|min:13',
            'authorfirstname' => 'required',
            'authorlastname' => 'required',
            'publishyear' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'category' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
        $book->title = $request->input('title');
        $book->ISBN_no = $request->input('ISBN_no');
        $book->authorfirstname = $request->input('authorfirstname');
        $book->authorlastname = $request->input('authorlastname');
        $book->publishyear = $request->input('publishyear');
        $book->price = $request->input('price');
        $book->stock = $request->input('stock');
        $book->category = $request->input('category');
        $book->category = implode(',', $book->category);
        $book->description = $request->input('description');
        $book->updated_at = now();

//Handles the uploading of the image
        if ($request->hasFile('image')){
//Gets the filename with the extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
//just gets the filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
//Just gets the extension
            $extension = $request->file('image')->getClientOriginalExtension();
//Gets the filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
//Uploads the image
            $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $book->image = $fileNameToStore;
        $book->save();
        return redirect('books')->with('success','The book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('books')->with('success','The book has been deleted');
    }
}
