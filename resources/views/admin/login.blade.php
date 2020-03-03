@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Login Page </h1>
        <p> This is the Admin Login Page </p>
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form method="POST" action="{{route('admin-process-login')}}" >
                        @csrf
                        @include('inc.messages')

                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password"  id="pwd">
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
