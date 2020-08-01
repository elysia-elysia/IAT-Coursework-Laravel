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
                        </div><br/> @endif
                <!-- display the success status -->
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br/> @endif
                <!-- define the form -->
                    <div class="card-body">
                        <form method="POST"
                              class="form-horizontal"
                              action="{{url('books') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8 form-group">
                                <label for="titleInput">Title</label>
                                <input type="text"
                                       name="title"
                                       id="titleInput"
                                       class="form-control"
                                       placeholder="Book Title"
                                       required/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="isbnInput">ISBN Number</label>
                                <input type="text"
                                       name="ISBN_no"
                                       id="isbnInput"
                                       placeholder="ISBN Number"
                                       required
                                       class="form-control"
                                       pattern="[0-9]{13}"
                                       title="ISBN Number should only contain 13 numeric values, e.g. 9780008134303"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label for="categoryInput">Book Category</label>
                                <select multiple class="form-control"
                                        name="category[]"
                                        required
                                        id="categoryInput"
                                        class="form-control">
                                    <option value="Computing">Computing</option>
                                    <option value="Business">Business</option>
                                    <option value="Languages">Languages</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Price</label>
                                <input type="text"
                                       name="price"
                                       placeholder="Price"
                                       required
                                       pattern="(\d+\.\d{1,2})"
                                       class="form-control"
                                       title="E.g. 12.99"/>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Author First Name</label>
                                <input type="text"
                                       name="authorfirstname"
                                       placeholder="Author First Name"
                                       required
                                       class="form-control"/>
                            </div>

                            <div class="col-md-8 form-group">
                                <label>Author Last Name</label>
                                <input type="text"
                                       name="authorlastname"
                                       placeholder="Author Last Name"
                                       required
                                       class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Publishing Year</label>
                                <input type="integer"
                                       name="publishyear"
                                       placeholder="Publishing Year"
                                       required
                                       class="form-control"
                                       pattern="[0-9]{4}"
                                       title="Year should be 4 digits long. E.g. 2014"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Description</label>
                                <textarea rows="4"
                                          cols="50"
                                          name="description"
                                          maxlength="256"
                                          class="form-control"> Notes about the book </textarea>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Stock</label>
                                <input type="integer"
                                       name="stock"
                                       placeholder="Stock"
                                       required class="form-control"/>
                            </div>
                            <div class="col-md-8 form-group">
                                <label>Image</label>
                                <input type="file"
                                       name="image"
                                       placeholder="Image file"
                                       class="form-control"/>
                            </div>
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary"/>
                                <input type="reset" class="btn btn-warning"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
