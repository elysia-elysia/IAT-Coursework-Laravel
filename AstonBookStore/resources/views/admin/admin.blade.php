@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
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
                        <a href="{{ url('books/create') }}" class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Add a Book</a>
                        <a href="{{ url('books') }}" class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">View All Books</a>
                        <a href="{{ url('admin/stockroom') }}" class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Stock Room</a>
                        <a href="{{ url('orders') }}" class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">View Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
