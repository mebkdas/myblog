<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if (Route::has('login'))
                            @auth
                            <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                             @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @foreach ($allBlogs as $allBlog)
    <div class="container">
        <div class="card">
        <div class="card-body">
        <h3 class="card-title">{{$allBlog->title}}</h3>
        <h6 style="text-align: right;">Posted Date & Time : <strong>{{$allBlog->created_at}}</strong>&emsp; &emsp; &emsp; Auth Name : <strong>{{$allBlog->userName['name']}}</strong></h6>
        <p class="card-text">{{$allBlog->description}}</p>
        <img class="card-img" style="width:400px;height: 200px" src="/uploads/users/{{$allBlog->file}}" alt="Project image">
        <img class="card-img" style="width:400px;height: 200px" src="{{asset('/uploads/users/'.$allBlog->file)}}" alt="Project image">
        </div>
        <div class="card-body">
            @php
            $count = count($allBlog->comments);
            for($i=0; $i <$count ; $i++) { 
                echo "<p><strong>".($allBlog->comments[$i]->user['name'])."- </strong>".($allBlog->comments[$i]['comment'])."</p>";
            }
            @endphp
        </div>
        @auth    
        <div class="card-body form-group">
            <form method="post" action="commentBlog">
                @csrf
                <input class="form-control input-lg" type="text" name="comment" required>
                <input type="hidden" name="bid" value={{$allBlog->id}}>
                <input type="hidden" name="uid" value={{auth()->user()->id}}>
                <button type="submit" class="btn btn-primary">Send Comment</button>
            </form>
        </div>
        @endauth
        </div>
        </div>  
        <br>
        <hr>
        <br>  
    @endforeach

</body>
</html>
