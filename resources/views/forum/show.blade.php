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
<hr>
<a class="btn btn-outline-dark mt-2" href="{{ route('forum.post.create',$forum->id) }}"> Create Post</a>


</div>
<div class="container">
<main class="grid grid-cols-4 gap-8 mt-8 wrapper">
@foreach($forum->post as $post)
       

        <section class="flex flex-col col-span-3 gap-y-4">
            <small class="text-sm text-gray-400">>Forum>{{$forum->name}}>post</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                       
                    </div>

                    {{-- Thread --}}
                    <div class="col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400"><a href="{{route('forum.post.show',[$forum,$post])}}">{{$post->name}}</a></h2>
                            <p class="text-gray-500">
                            {{$post->description}}                            </p>
                           
                        </div>

                        <div class="flex justify-between">

                            {{-- Likes --}}
                            <div class="flex space-x-5 text-gray-500">
                                
                                    <span class="text-xs font-bold"><b>Posted by:</b>{{$forum->user->name}}</span>
                                
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                            <b>Date:</b> {{ \Carbon\Carbon::createFromTimestamp(strtotime($forum->created_at))->format('d-m-Y   h:i:s  ')}}
                            @if (Route::has('login'))
                            @auth
                            @if($forum->user->id==Auth::user()->id)
                            <form action="{{ route('forum.destroy',$forum->id) }}" method="Post">
    
                            <a class="btn btn-outline-dark" href="{{ route('forum.edit',$forum->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')  
                                <button type="submit" class="btn btn-outline-dark">Delete</button>
                            </form>
                            @endauth
                            @endif
                             @endif
       
                         </section>
        @endforeach
    </main>


    </div>
    </body>
</html>
