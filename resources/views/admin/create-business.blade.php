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
                    <form method="POST" action="/admin/login" >
                        @csrf
                        <div class="form-group">
                            <label for="email">Business Name :</label>
                            <input type="email" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Business Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Business Physical Address: </label>
                            <textarea name="location" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pwd"> Category:</label>
                            <select name="category" class="form-control">
                                <option name="category[]" value=""> -- Select a Category -- </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>
    </div>
@endsection
