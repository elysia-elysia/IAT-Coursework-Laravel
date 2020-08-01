@extends('layouts.app')
@section('content')
    {{--    <div class="container">--}}
    <div class="row justify-content-center">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">Stock Room</div>
                <!-- display the errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul> @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div><br/> @endif
            <!-- display the success status -->
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ \Session::get('success') }}</p>
                    </div><br/> @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ISBN Number</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Publishing Year</th>
                            <th colspan="3">Stock</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{$book['ISBN_no']}}</td>
                                <td>{{$book['title']}}</td>
                                <td>{{$book['category']}}</td>
                                <td>{{$book['authorfirstname']}} {{$book['authorlastname']}}</td>
                                <td>{{$book['publishyear']}}</td>

                                @if(Auth::check() && (Auth::user()->role == 1))
                                    <td>
                                        <form action="{{action('BookController@updateStock', $book['id'])}}"
                                              method="post"> @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <input class="form-control"
                                                           type="number"
                                                           value="{{$book['stock']}}"
                                                           name="stock"
                                                           min="0">
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-danger" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    @endif
                                    </form>
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
