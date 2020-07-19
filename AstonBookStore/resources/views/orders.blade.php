@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Display all Orders</div>
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
                                <th>Order Number</th>
                                @if(Auth::check() && (Auth::user()->role == 1))
                                <th>Customer</th>
                                @endif
                                <th>Order Price</th>
                                <th>Order Date/Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$order['orderno']}}</td>
                                    @if(Auth::check() && (Auth::user()->role == 1))
                                    <td>{{$order['userid']}}</td>
                                    @endif
                                    <td>{{$order['orderprice']}}</td>
                                    <td>{{$order['created_at']}}</td>
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
