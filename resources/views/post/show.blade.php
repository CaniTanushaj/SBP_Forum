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
<h2 class="mt-2">{{$post->name}}</h2>
<p class="text-gray-500 mb-0">{{$post->description}}<p>
<p class="text-gray-500 mb-0"><b>Posted by:</b>{{$post->user->name}}<p>
<hr>
<small class="text-sm text-gray-400">>Forum>{{$forum->name}}>post>{{$post->name}}</small>
<form action="{{ route('post.comment.store',$post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Write a comment:</strong>
                        <input class="form-control input-lg" type="text" name="content" class="form-control" placeholder="">
                        @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @endif
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="forum_id" value="{{$forum->id}}">
                    </div>  
                </div>
</div>

                
                <button type="submit" class="btn btn-outline-dark ml-3">Submit</button>
            </div>
            
        </form>
    @foreach($post->comment as $comment)
    {{$comment->content}}
    @endforeach
</div>
    </body>
</html>
