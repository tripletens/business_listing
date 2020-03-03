@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Business Search Page </h1>
        <p> This is the Admin Business Search Page </p>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form method="POST" action="{{ route('process-search')}}">
                        @csrf
                        <div class="form-group">
                            <label for="keyword"> Search Keyword : </label>
                            <input type="text" name="keyword" class="form-control" placeholder="Enter Keyword"/>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name: </label>
                                <input type="checkbox" name="name" value="name"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Description: </label>
                                <input type="checkbox" name="description" value="description"/>
                            </div>
                        </div>

                        <button type="submit" class=" btn btn-primary form-control">Search</button>
                    </form>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
@endsection
