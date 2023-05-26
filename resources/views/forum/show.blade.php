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
      <li class="nav-item-active">
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
    @auth
    <li><form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                @csrf
                @method('DELETE')
                <button class="btn btn-white" type="submit">Logout</button>
            </form>
    
    

            @if ($message = Session::get('success'))


    @endauth


@endif</li>
    </ul>
    
  </div>
  </div>
  @endif
</nav>
@if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
<div class="container">
<h2 class="mt-2">{{$forum->name}}</h2>
<a class="btn btn-outline-dark mt-2" href="{{ route('forum.post.create',$forum->id) }}"> Create Post</a>
@foreach($forum->post as $post)
{{$post->name}}
{{$post->description}}
@endforeach
</div>




    </body>
</html>
