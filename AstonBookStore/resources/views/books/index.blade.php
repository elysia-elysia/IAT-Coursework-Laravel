@extends('layouts.app')
@section('content')
{{--    <div class="container">--}}
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <p class="font-weight-bold">Filter by category:</p>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="filterComputing" name="filterComputing">
                        <label class="custom-control-label" for="filterComputing">Computing</label>
                    </div>

                    <!-- Default inline 2-->
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="filterBusiness" name="filterBusiness">
                        <label class="custom-control-label" for="filterBusiness">Business</label>
                    </div>

                    <!-- Default inline 3-->
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="filterLanguages" name="filterLanguages">
                        <label class="custom-control-label" for="filterLanguages">Languages</label>
                    </div>
                    <div class="card-header">All Books</div>
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ISBN Number</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Author First Name</th>
                                <th>Author Last Name</th>
                                <th>Publishing Year</th>
                                <th>No. in Stock</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{$book['ISBN_no']}}</td>
                                    <td>{{$book['title']}}</td>
                                    <td>£{{$book['price']}}</td>
                                    <td>{{$book['category']}}</td>
                                    <td>{{$book['authorfirstname']}}</td>
                                    <td>{{$book['authorlastname']}}</td>
                                    <td>{{$book['publishyear']}}</td>
                                    <td>{{$book['stock']}}</td>

                                    <td><a href="{{action('BookController@show', $book['id'])}}" class="btn btn-primary">Details</a></td>
                                    @if(Auth::check() && (Auth::user()->role == 1))
                                        <td><a href="{{action('BookController@edit', $book['id'])}}" class="btn btn-warning">Edit</a></td>
                                        <td>
                                            <form action="{{action('BookController@destroy', $book['id'])}}"
                                                  method="post"> @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg></button>
                                            </form>
                                        </td>
                                    @endif
                                    @if(Auth::check() && (Auth::user()->role == 0))
                                        @if($book['stock']<= 0)
                                            <td><a href="{{action('BookController@addToBasket', $book['id'])}}" class="btn btn-secondary disabled">Out Of Stock</a></td>
                                        @else
                                            <td><a href="{{action('BookController@addToBasket', $book['id'])}}" class="btn btn-primary">Add To Basket</a></td>
                                        @endif

                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection
