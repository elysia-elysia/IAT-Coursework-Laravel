@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header font-weight-bold">{{$book->title}}</div>
                    <!-- display the errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul> @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> @endforeach
                            </ul>
                        </div><br /> @endif
                <!-- display the success status -->
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br /> @endif
                    <div class="card-body">
                        <table class="table table-striped" border="1" >
                            <tr> <th> <b>ISBN Number </th> <td> {{$book['ISBN_no']}}</td></tr>
                            <tr> <th>Title </th> <td>{{$book->title}}</td></tr>
                            <tr> <th>Price </th> <td>£{{$book->price}}</td></tr>
                            <tr> <th>Category </th> <td>{{$book->category}}</td></tr>
                            <tr> <th>Author First Name </th> <td>{{$book->authorfirstname}}</td></tr>
                            <tr> <th>Author Last Name </th> <td>{{$book->authorlastname}}</td></tr>
                            <tr> <th>Publishing Year </th> <td>{{$book->publishyear}}</td></tr>
                            <tr> <th>Description </th> <td style="max-width:150px;" >{{$book->description}}</td></tr>
                            <tr> <th>No. in Stock </th> <td>{{$book->stock}}</td></tr>
                            @if($book->image != "noimage.jpg")
                            <tr> <td colspan='2' ><img style="width:100%;height:100%"
                                                       src="{{ asset('storage/images/'.$book->image)}}"></td></tr>
                            @else
                                <tr>  <td class="text-center" colspan='2'>No Image Available</td></tr>
                            @endif

                        </table>
                        <table>
                            <tr>
                                <td><a href="{{route('books.index')}}" class="btn btn-primary" role="button">Back to the list</a></td>
                                @if(Auth::check() && (Auth::user()->role == 1))
                                    <td><a href="{{action('BookController@edit', $book['id'])}}" class="btn btn-warning">Edit</a></td>
                                    <td><form action="{{action('BookController@destroy', $book['id'])}}" method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form></td>
                                @endif
                                @if(Auth::check() && (Auth::user()->role == 0))
                                    @if($book['stock']<= 0)
                                        <td><a href="{{action('BookController@addToBasket', $book['id'])}}" class="btn btn-secondary disabled">Out Of Stock</a></td>
                                    @else
                                        <td><a href="{{action('BookController@addToBasket', $book['id'])}}" class="btn btn-primary">Add To Basket</a></td>
                                    @endif
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
