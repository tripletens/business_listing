@extends('layout.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Admin Add Business to category Page </h1>
        <p> This is the Admin Add Business to category Page </p>
        <div class="container-fluid ">
            <div class="row">

                <div class="col-md-4">

                </div>
                <div class="col-md-4">
                    <form method="POST" action="{{ route('process-add-business-to-category')}}" >
                        @csrf
                        @include('inc.messages')
                        <div class="form-group">
                            <label for="pwd"> business:</label>
                            <select name="business_id" class="form-control" required>
                                <option name="business_id[]" value=""> -- Select a Business -- </option>
                                @if(count($businesses) > 0 )
                                    @foreach ($businesses as $business)
                                        <option name="business_id[]" value="{{ $business->id }}"> {{ $business->name }}</option>
                                    @endforeach
                                @else
                                    <option name="business_id[]" value=""> No Business Available </option>
                                @endif
                            </select>
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

                        <button type="submit" class="btn btn-primary btn-block">Add Business to Category</button>
                    </form>
                </div>
                <div class="col-md-4">

                </div>
            </div>

        </div>
    </div>
@endsection
