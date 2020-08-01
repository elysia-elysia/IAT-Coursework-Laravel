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
                            <div class="col-md-8 form-group">
                                <label >Title</label>
                                <input type="text"
                                       name="title"
                                       value="{{$book->title}}"
                                       required
                                       class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label >ISBN Number</label>
                                <input type="text"
                                       name="ISBN_no"
                                       value="{{$book->ISBN_no}}"
                                       required
                                       class="form-control"
                                       pattern="[0-9]{13}"
                                       title="ISBN Number should only contain 13 numeric values, e.g. 9780008134303"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Book Category</label>
                                <select  multiple
                                         class="form-control"
                                         name="category[]"
                                         required>
                                    <option value="Computing" {{ str_contains( $book->category,'Computing') ? 'selected' : '' }}>Computing</option>
                                    <option value="Business" {{ str_contains($book->category,'Business') ? 'selected' : '' }}>Business</option>
                                    <option value="Languages" {{ str_contains($book->category,'Languages') ? 'selected' : '' }}>Languages</option>
                                </select>
                            </div>

                            <div class="col-md-8 form-group">
                                <label >Price</label>
                                <input type="text"
                                       name="price"
                                       value="{{$book->price}}"
                                       required
                                       pattern="(\d+\.\d{1,2})"
                                       class="form-control"
                                       title="E.g. 12.99"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label >Author First Name</label>
                                <input type="text"
                                       name="authorfirstname"
                                       value="{{$book->authorfirstname}}"
                                       required
                                       class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label >Author Last Name</label>
                                <input type="text"
                                       name="authorlastname"
                                       value="{{$book->authorlastname}}"
                                       required
                                       class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label >Publishing Year</label>
                                <input type="integer"
                                       name="publishyear"
                                       value="{{$book->publishyear}}"
                                       required pattern="[0-9]{4}"
                                       title="Year should be 4 digits long. E.g. 2014"
                                       class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label >Description</label>
                                <textarea rows="4"
                                          cols="50"
                                          name="description"
                                          maxlength="256"
                                          class="form-control"> {{$book->description}}</textarea>
                            </div>

                            <div class="col-md-8 form-group">
                                <label >Stock</label>
                                <input type="integer"
                                       name="stock"
                                       value="{{$book->stock}}"
                                       required class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Image</label>
                                <input type="file"
                                       name="image"
                                       class="form-control"/>
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
