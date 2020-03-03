@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Create Category Page </h1>
        <p> This is the Admin Create Category Page </p>
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form method="POST" action="{{ route('admin-process-category')}}" >
                        @csrf
                        @include('inc.messages')
                        <div class="form-group">
                            <label for="email">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <button type="submit" class="btn btn-default">Create Category </button>
                    </form>
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>
    </div>
@endsection
