@if (count($errors) > 0 )
    @foreach ( $errors->all() as $error)
        <span class="alert alert-danger">
            {{ $error }}
        </span>
        <br><br>
    @endforeach
@endif
@if ( session('success') )
        <span class="alert alert-success" >
            {{ session('success') }}
        </span>
        <br><br>
@endif
@if ( session('error') )
    <span class="alert alert-danger">
        {{ session('error') }}
    </span>
    <br><br>
@endif
