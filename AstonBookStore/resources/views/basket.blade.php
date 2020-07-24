@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">Your Basket</div>
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
    @if(\Illuminate\Support\Facades\Session::has('basket') && count(\Illuminate\Support\Facades\Session::get('basket')->items)>0)
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ISBN Number</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author First Name</th>
                                    <th scope="col">Author Last Name</th>
                                    <th scope="col">Price</th>
                                    <th  scope="col" colspan="4">Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <td>{{$book['item']['ISBN_no']}}</td>
                                        <td>{{$book['item']['title']}}</td>
                                        <td>{{$book['item']['authorfirstname']}}</td>
                                        <td>{{$book['item']['authorlastname']}}</td>
                                        <td>£{{$book['price']}}</td>

                                        @if(Auth::check() && (Auth::user()->role == 0))
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <form action="{{action('BookController@updateBasketQuantity', $book['item']['id'])}}"
                                                              method="post"> @csrf
                                                            <div class="row">
                                                                <div class="col">
                                                                    <input class="form-control" type="number" value="{{$book['quantity']}}" name="quantity">
                                                                </div>
                                                                <div class="col-md-auto">
                                                                    <button class="btn btn-warning" type="submit">Update </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <form action="{{action('BookController@removeFromBasket', $book['item']['id'])}}"
                                                              method="post"> @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button class="btn btn-danger" type="submit"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                                </svg></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                            @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <strong> Total Quantity: {{ $totalQuantity }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <strong> Total Cost: £{{ $totalPrice }}</strong>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                    <button type="button" class="btn btn-success">Checkout</button>
                                </div>
                            </div>
                            @else
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                                        <h2>You have no items in your basket!</h2>
                                    </div>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
