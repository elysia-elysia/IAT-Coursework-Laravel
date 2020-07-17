@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-header">Edit and update the book</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @endif
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ action('BookController@update',
$book['id']) }} " enctype="multipart/form-data" >
                            @method('PATCH')
                            @csrf
                            <div class="col-md-8">
                                <label >Title</label>
                                <input type="text" name="title"
                                       value="{{$book->title}}" />
                            </div>
                            <div class="col-md-8">
                                <label >ISBN Number</label>
                                <input type="text" name="ISBN_no"
                                       value="{{$book->ISBN_no}}"/>
                            </div>
                            <div class="col-md-8">
                                <label>Book Category</label>
                                <select  multiple class="form-control" name="category[]" >
                                    <option value="Computing">Computing</option>
                                    <option value="Business">Business</option>
                                    <option value="Languages">Languages</option>
                                </select>
                            </div>

                            <div class="col-md-8">
                                <label >Price</label>
                                <input type="text" name="price"
                                       value="{{$book->price}}" />
                            </div>
                            <div class="col-md-8">
                                <label >Author First Name</label>
                                <input type="text" name="authorfirstname"
                                       value="{{$book->authorfirstname}}" />
                            </div>
                            <div class="col-md-8">
                                <label >Author Last Name</label>
                                <input type="text" name="authorlastname"
                                       value="{{$book->authorlastname}}" />
                            </div>
                            <div class="col-md-8">
                                <label >Publishing Year</label>
                                <input type="integer" name="publishyear"
                                       value="{{$book->publishyear}}" />
                            </div>
                            <div class="col-md-8">
                                <label >Description</label>
                                <textarea rows="4" cols="50" name="description" > {{$book->description}}
</textarea>
                            </div>

                            <div class="col-md-8">
                                <label >Stock</label>
                                <input type="integer" name="stock"
                                       value="{{$book->stock}}" />
                            </div>
                            <div class="col-md-8">
                                <label>Image</label>
                                <input type="file" name="image" />
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" />
                                <input type="reset" class="btn btn-primary" />
                            </div>


{{--                            -------------------------------}}
{{--                            <div class="col-md-8">--}}
{{--                                <label>book Type</label>--}}
{{--                                <select name="category" value="{{ $book->category }}">--}}
{{--                                    <option value="car">Car</option>--}}
{{--                                    <option value="truck">Truck</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
