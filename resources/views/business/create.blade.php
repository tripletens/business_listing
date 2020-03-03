@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Create Business Page </h1>
        <p> This is the Admin Create Business Page </p>
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form method="POST" action="{{ route('admin-process-business')}}"  enctype="multipart/form-data">
                        @csrf
                        @include('inc.messages')
                        <div class="form-group">
                            <label for="name">Business Name :</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Business Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="description">Business Description: </label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Business Physical Address: </label>
                            <textarea name="address" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="url">Business Website:</label>
                            <input type="url" class="form-control" name="url" id="url">
                        </div>
                        <div class="form-group">
                            <label for="phone">Business Office Phone:</label>
                            <input type="number" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Business Mobile Number:</label>
                            <input type="mobile" class="form-control" name="mobile" id="mobile">
                        </div>
                        <div class="form-group">
                            <label for="image1">Business Image 1:</label>
                            <input type="file" class="form-control" name="image1" id="image1">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Business Image 2:</label>
                            <input type="file" class="form-control"  name="image2" id="image2">
                        </div>
                        <div class="form-group">
                            <label for="mobile">Business Image 3:</label>
                            <input type="file" class="form-control"  name="image3" id="image3">
                        </div>
                        <div class="form-group">
                            <label for="pwd"> Category:</label>
                            <select name="category_id" class="form-control" required>
                                <option name="category_id[]" value=""> -- Select a Category -- </option>
                                @if(count($categories) > 0 )
                                    @foreach ($categories as $category)
                                        <option name="category_id[]" value="{{ $category->id }}"> {{ $category->title }}</option>
                                    @endforeach
                                @else
                                    <option name="category_id[]" value=""> No category Available </option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register Business </button>
                    </form>
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>
    </div>
@endsection
