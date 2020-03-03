@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Category List Page </h1>
        <p> This is the Admin Category List Page </p>
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    @if (count($categories) > 0 )
                        <ol type="i">
                        @foreach ($categories as $category)
                            <li> {{ $category->title }} </li>
                        @endforeach
                        </ol>
                    @else
                        <span class="alert alert-info"> No Category Available</span>
                    @endif
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>
    </div>
@endsection
