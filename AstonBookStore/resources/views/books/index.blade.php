@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
@endsection

@section('content')
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
                                <th >Action</th>
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

                                    <td><a href="{{action('BookController@show', $book['id'])}}" class="btn btn-primary">Details</a>

                                    @if(Auth::check() && (Auth::user()->role == 1))
                                        <a href="{{action('BookController@edit', $book['id'])}}" class="btn btn-warning">Edit</a>

                                            <form action="{{action('BookController@destroy', $book['id'])}}"
                                                  method="post"> @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger" type="submit"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg></button>
                                            </form>

                                    @endif
                                    @if(Auth::check() && (Auth::user()->role == 0))
                                        @if($book['stock']<= 0)
                                            <a href="{{action('OrderController@addToBasket', $book['id'])}}" class="btn btn-secondary disabled">Out Of Stock</a>
                                        @else
                                            <a href="{{action('OrderController@addToBasket', $book['id'])}}" class="btn btn-primary">Add To Basket</a>
                                            @endif
                                            @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#books thead tr').clone(true).appendTo( '#books thead' );
            $('#books thead tr:eq(1) th').each( function (i) {
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

                $( 'input', this ).on( 'keyup change', function () {
                    if ( table.column(i).search() !== this.value ) {
                        table
                            .column(i)
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
            $('#books').dataTable();
        });
    </script>
@endsection
