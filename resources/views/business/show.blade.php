@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Business List Page </h1>
        <p> This is the Admin Business List Page </p>
        <div class="container-fluid ">
            <div class="row">

                {{-- <div class="col-md-2">

                </div> --}}
                <div class="col-md-10" style="border-bottom:5px dotted;">

                            <div class="col-md-4">
                                <img src="{{ asset('images/default.jpg') }}" class="img-responsive">
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <h4> Business Name : </h4>  <h5> {{ $business->name }} </h5>
                                <h4> Business Description : </h4> <h5> {{ $business->description }} </h5>
                                <h4> Business Email Address : </h4> <h5> {{ $business->email }} </h5>
                                <h4> Business Website : </h4> <h5> {{ $business->url }} </h5>
                                <h4> Business Office Phone: </h4> <h5> {{ $business->phone }} </h5>
                                <h4> Business Mobile Phone: </h4> <h5> {{ $business->mobile }} </h5>

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
                            <div class="col-md-2">
                                @auth
                                    <a href="/business/edit/{{$business->id}}">
                                        <button class="btn btn-info btn-sm pull-left">
                                            Edit
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ route('deactivate-business',$business->id)}}">
                                        @csrf
                                        <button  type="submit" class="btn btn-sm btn-warning" > Deactivate </button>
                                    </form>
                                    <br>
                                    <form method="POST" action="{{ route('activate-business',$business->id)}}">
                                        @csrf
                                        <button  type="submit" class="btn btn-sm btn-success" > Activate </button>
                                    </form>
                                    <br>
                                    <form method="POST" action="{{ route('delete-business',$business->id)}}">
                                        @csrf
                                        <button  type="submit" class="btn btn-sm btn-danger " > Delete </button>
                                    </form>
                                @endauth
                            </div>


                </div>
                <div class="col-md-2">

                </div>
            </div>

        </div>
    </div>
@endsection
