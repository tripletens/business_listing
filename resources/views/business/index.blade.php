@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Business List Page </h1>
        <p> This is the Admin Business List Page </p>
        <div class="container-fluid ">
            <div class="row">
                @include('inc.messages')
                <br><br>
                {{-- <div class="col-md-2">

                </div> --}}
                <div class="col-md-10" >
                    @if (count($businesses) > 0 )

                        @foreach ($businesses as $item)

                            <div class="col-md-4" style="border-bottom:5px dotted;">
                                <img src="{{ asset('images/default.jpg') }}" class="img-responsive">
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <h4> Business Name : </h4>  <h5> {{ $item->name }} </h5>
                                <h4> Business Description : </h4> <h5> {{ $item->description }} </h5>
                                <h4> Business Email Address : </h4> <h5> {{ $item->email }} </h5>
                                <h4> Business Website : </h4> <h5> {{ $item->url }} </h5>
                                <h4> Business Office Phone: </h4> <h5> {{ $item->phone }} </h5>
                                <h4> Business Mobile Phone: </h4> <h5> {{ $item->mobile }} </h5>
                                 <h4> Business Status: </h4> <h5>
                                     @if ($item->deactivate == true)
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
                                            {{ $item->views }} Views
                                        </button> </h5>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('view-count' , $item->id) }}">
                                    <button class="btn btn-info">
                                        View
                                    </button>
                                </a>
                            </div>

                        @endforeach
                        </ol>
                    @else
                        <span class="alert alert-info"> No Business Available</span>
                    @endif
                </div>
                <div class="col-md-2">

                </div>
            </div>

        </div>
    </div>
@endsection
