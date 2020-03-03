@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Business Search Result Page </h1>
        <p> This is the Admin Business Search Result Page </p>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-10 row">
                    @if (count($result) > 0 )

                        @foreach ($result as $key => $item)
                            <div class="col-md-5">
                                <img src="{{ asset('images/default.jpg') }}" class="img-responsive">
                            </div>
                            <div class="col-md-7" style="text-align:left;border-bottom:5px dotted;">
                                <h4> Business Name : </h4>  <h5> {{ $item->name }} </h5>
                                <h4> Business Description : </h4> <h5> {{ $item->description }} </h5>
                                <h4> Business Email Address : </h4> <h5> {{ $item->email }} </h5>
                                <h4> Business Website : </h4> <h5> {{ $item->url }} </h5>
                                <h4> Business Office Phone: </h4> <h5> {{ $item->phone }} </h5>
                                <h4> Business Mobile Phone: </h4> <h5> {{ $item->mobile }} </h5>
                                <h4> Business Status: </h4> <h5>
                                     @if ($business->deactivate == true)
                                        <button class="btn btn-danger">
                                            Deactivated
                                        </button>
                                     @else
                                        <button class="btn btn-success">
                                            Active
                                        </button>
                                     @endif
                                </h5>
                                <h4> Business Views: </h4> <h5>
                                    <button class="btn btn-info">
                                            {{ $business->views }} Views
                                        </button> </h5>
                            </div>

                        @endforeach

                    @else
                        <span class="alert alert-info">No Business Found</span>
                    @endif

                </div>
                <div class="col-md-1">

                </div>
            </div>
        </div>
    </div>
@endsection
