@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Display all books</div>
                    <div class="card-body">
                        <table class="table table-striped" border="1" >
                            <tr> <th> <b>ISBN Number </th> <td> {{$book['ISBN_no']}}</td></tr>
                            <tr> <th>Title </th> <td>{{$book->title}}</td></tr>
                            <tr> <th>Price </th> <td>{{$book->price}}</td></tr>
                            <tr> <th>Category </th> <td>{{$book->category}}</td></tr>
                            <tr> <th>Author First Name </th> <td>{{$book->authorfirstname}}</td></tr>
                            <tr> <th>Author Last Name </th> <td>{{$book->authorlastname}}</td></tr>
                            <tr> <th>Publishing Year </th> <td>{{$book->publishyear}}</td></tr>
                            <tr> <th>Description </th> <td style="max-width:150px;" >{{$book->description}}</td></tr>
                            <tr> <th>No. in Stock </th> <td>{{$book->stock}}</td></tr>
                            <tr> <td colspan='2' ><img style="width:100%;height:100%"
                                                       src="{{ asset('storage/images/'.$book->image)}}"></td></tr>
                        </table>
                        <table><tr>
                                <td><a href="{{route('books.index')}}" class="btn btn-primary" role="button">Back to the
list</a></td>
<td><a href="{{action('BookController@edit', $book['id'])}}" class="btn
btn- warning">Edit</a></td>
                                <td><form action="{{action('BookController@destroy', $book['id'])}}"
                                          method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form></td>
                            </tr></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
