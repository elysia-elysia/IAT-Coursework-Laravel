@extends('layouts.app')
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{--    <div class="container">--}}
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
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
{{--                    <div class="align-content-center">--}}
{{--                        <form method="POST" action="{{ action('BookController@filterSort') }} " enctype="multipart/form-data" class="form-inline">--}}
{{--                            @method('PATCH')--}}
{{--                            @csrf--}}
{{--                            <p class="font-weight-bold">Filter by category:</p>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <label class="form-check-label">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="filterComputing" name="filterComputing" value="Computing"> Computing--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <label class="form-check-label">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="filterBusiness" name="filterBusiness" value="Business"> Business--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <label class="form-check-label">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="filterLanguages" name="filterLanguages" value="Languages"> Languages--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                            <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="sortBy" name="sortBy">--}}
{{--                                <option selected>Sort By</option>--}}
{{--                                <option value="priceHL">Price (High to Low)</option>--}}
{{--                                <option value="priceLH">Price (Low to High)</option>--}}
{{--                                <option value="3">Three</option>--}}
{{--                            </select>--}}
{{--                            <button type="submit" class="btn btn-primary">Filter</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}

                    <div class="card-body">
                        <table class="table table-striped" id="books">
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

                    <script>
                        $(document).ready(function() {
                            $('#books').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: '{{ url('books.index') }}',
                                columns: [
                                    { data: 'ISBN Number', name: 'ISBN Number' },
                                    { data: 'Title', name: 'Title' },
                                    { data: 'Price', name: 'Price' },
                                        { data: 'Category', name: 'Category' },
                                        { data: 'Author First Name', name: 'Author First Name' },
                                        { data: 'Author Last Name', name: 'Author Last Name' },
                                        { data: 'Publishing Year', name: 'Publishing Year' },
                                        { data: 'No. in Stock', name: 'No. in Stock' },
                                    {data: 'action', name: 'action', orderable: false, searchable: false}
                                ]
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
{{--    </div>--}}
@endsection
