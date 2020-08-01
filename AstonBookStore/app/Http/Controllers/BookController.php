<?php

namespace App\Http\Controllers;

use App\BookImage;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Basket;
use App\Order;


class BookController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Book Functions
    public function index(Request $request)
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // form validation
        $book = $this->validate(request(), [
            'title' => 'required',
            'ISBN_no' => 'required|max:13|min:13',
            'authorfirstname' => 'required',
            'authorlastname' => 'required',
            'publishyear' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'category' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'description' => 'max:256'
        ]);

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
        // save the book object
        $book->save();

        //Handles the uploading of the image
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                //Gets the filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                //$items = Item::create($request->all());

                $filename = $image->storeAs('public/images', $fileNameToStore);
                BookImage::create([
                    'book_id' => $book->id,
                    'filename' => $fileNameToStore
                ]);

            }
        } else {//
        }
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'The book has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        $imagesQuery = BookImage::all();
        $imagesQuery = $imagesQuery->where('book_id', $id);
        //dd(count($imagesQuery));
        return view('books.show', array('images' => $imagesQuery), compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
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
            'publishyear' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'category' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            'description' => 'max:256'
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
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $image->getClientOriginalExtension();
                //Gets the filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $filename = $image->storeAs('public/images', $fileNameToStore);
                BookImage::create([
                    'book_id' => $book->id,
                    'filename' => $fileNameToStore
                ]);
            }
        } else {}
        $book->save();
        return redirect('books')->with('success', 'The book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect('books')->with('success', 'The book has been deleted');
    }

    //Stock Room Functions

    /**
     * Show the stockroom for admins to edit a books stock
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stockroom()
    {
        $books = Book::all()->toArray();
        return view('/admin/stockroom', compact('books'));
    }

    /**
     * Update a books stock and save to the database
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStock(Request $request, $id)
    {
        $book = Book::find($id);
        // form validation
        $this->validate(request(), [
            'stock' => 'required|numeric'
        ]);
        $book->stock = $request->input('stock');
        $book->updated_at = now();

        $book->save();
        return redirect('/admin/stockroom')->with('success', 'The book has been updated');
    }
}
