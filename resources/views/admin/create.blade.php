@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Register Page </h1>
        <p> This is the Admin Register Page </p>
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form method="POST" action="/admin/login" >
                        @csrf
                        <div class="form-group">
                            <label for="email">Username:</label>
                            <input type="email" class="form-control" name="username" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password"  id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd"> Confirm Password:</label>
                            <input type="cpassword" class="form-control" name="password"  id="pwd">
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
