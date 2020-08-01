@extends('layouts.app')
@section('content')
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
    <div class="row justify-content-center">
        <div class="flex-center position-ref full-height">
            <div class="jumbotron align-items-center text-center">
                <h1 class="display-4 ">Welcome to Aston Book Store! </h1>
                <p class="lead">Browse our books. Register or Login to buy them!</p>
                <hr class="my-4">

                <a class="btn btn-primary btn-lg" href="{{ url('books') }}" role="button">To The Books!</a>
            </div>
        </div>
    </div>
    </div>
@endsection
