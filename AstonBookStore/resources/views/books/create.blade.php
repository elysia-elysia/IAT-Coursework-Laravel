<!-- inherit master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-header">Create an new book</div>
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
                <!-- define the form -->
                    <div class="card-body">
                        <form class="form-horizontal" method="POST"
                              action="{{url('books') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8">
                                <label >Title</label>
                                <input type="text" name="title"
                                       placeholder="Book Title" />
                            </div>
                            <div class="col-md-8">
                                <label >ISBN Number</label>
                                <input type="text" name="ISBN_no"
                                       placeholder="ISBN Number" />
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
                                       placeholder="Price" />
                            </div>
                            <div class="col-md-8">
                                <label >Author First Name</label>
                                <input type="text" name="authorfirstname"
                                       placeholder="Author First Name" />
                            </div>
                            <div class="col-md-8">
                                <label >Author Last Name</label>
                                <input type="text" name="authorlastname"
                                       placeholder="Author Last Name" />
                            </div>
                            <div class="col-md-8">
                                <label >Publishing Year</label>
                                <input type="integer" name="publishyear"
                                       placeholder="Publishing Year" />
                            </div>
                            <div class="col-md-8">
                                <label >Description</label>
                                <textarea rows="4" cols="50" name="description"> Notes
about the book </textarea>
                            </div>
                            <div class="col-md-8">
                                <label >Stock</label>
                                <input type="integer" name="stock"
                                       placeholder="Stock" />
                            </div>
                            <div class="col-md-8">
                                <label>Image</label>
                                <input type="file" name="image"
                                       placeholder="Image file" />
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" />
                                <input type="reset" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
