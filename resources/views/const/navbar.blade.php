<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Business Directory Service</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li ><a href="{{ route('view-search') }}">Search for Business </a></li>
        @auth
           <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Business
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('admin-create-business') }}">Create Business</a></li>
                    <li><a href="{{ route('admin-add-business-to-category') }}">Add Business to Category</a></li>
                    <li><a href="/">View Businesses</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{route('admin-create-category')}}">Create Category</a></li>
                    <li><a href="{{ route('admin-view-categories')}}">View Categories</a></li>
                </ul>
            </li>
        @endauth

      </ul>
      @guest
        <ul class="nav navbar-nav navbar-right">
            {{-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> --}}
            <li><a href="/admin/login"><span class="glyphicon glyphicon-log-in"></span>Admin Login</a></li>
        </ul>
      @endguest
      @auth
        <ul class="nav navbar-nav navbar-right">
            <li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button  class="btn btn-lg btn-danger pull-right" type="submit" >
                       Logout
                    </button>
                </form>
            </li>
        </ul>
      @endauth
    </div>
  </div>
</nav>
