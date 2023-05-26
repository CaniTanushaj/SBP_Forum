<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
        
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('/')}}">Home</a>
  <div class="justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      @if (Route::has('login'))
      @auth
      <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">{{ Auth::user()->name }}</a>
      </li>
      @else
      <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">Log in</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">Register</a>
      </li>
    @endauth
    <li><form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-white" type="submit">Logout</button>
            </form>
    
    

            @if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif</li>
    </ul>
    
  </div>
  </div>
  @endif
</nav>
            <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add forum</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-outline-dark" href="{{ route('forum.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('forum.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>forum name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="forum name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>forum description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="forum description">
                        @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                    </div>  
                </div>
</div>

                
                <button type="submit" class="btn btn-outline-dark ml-3">Submit</button>
            </div>
            
        </form>
        
    </div>
    </body>
</html>