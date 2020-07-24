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

                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col">
                                <h1>Checkout</h1>
                                <h4>Your Total: £{{ $totalPrice }}</h4>
                                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Full Name</label>
                                                <input type="text" id="name" class="form-control" required name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="card-number">Credit Card Number</label>
                                                <input type="text" id="card-number" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea rows="4" cols="50" id="address" name="address" maxlength="256" class="form-control" required> </textarea>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-success">Buy now</button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
        </div>
@endsection
