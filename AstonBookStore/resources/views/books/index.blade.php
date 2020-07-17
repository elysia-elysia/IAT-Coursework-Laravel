@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">Display all Books</div>
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
                                    <td>{{$book['price']}}</td>
                                    <td>{{$book['category']}}</td>
                                    <td>{{$book['authorfirstname']}}</td>
                                    <td>{{$book['authorlastname']}}</td>
                                    <td>{{$book['publishyear']}}</td>
                                    <td>{{$book['stock']}}</td>
                                    <td><a href="{{action('BookController@show', $book['id'])}}" class="btn
btn- primary">Details</a></td>
                                    <td><a href="{{action('BookController@edit', $book['id'])}}" class="btn
btn- warning">Edit</a></td>
                                    <td>
                                        <form action="{{action('BookController@destroy', $book['id'])}}"
                                              method="post"> @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" type="submit"> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
