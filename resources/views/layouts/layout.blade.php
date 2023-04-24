<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imageboard</title>
    <link rel="stylesheet" href="{{ asset('css/pico.css') }}" >
</head>
<body>
    <nav style="padding: 0 20px 0 20px">
        <ul>
            <li><h3><a href="{{ route('index') }}">Imageboard</a></h3></li>
        </ul>
        <ul>
            <form method="POST" action="{{ route('tag_search')}}">
                @csrf
                <li>
                    Tags: 
                    <input type="text" name="search">
                </li>
            </form>
        </ul>
        <ul>
            @if( auth()->check() )
                <li>
                    <a href="{{route('profile', auth()->id())}}" style="color:orange;">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <a href="{{ route('auth.logout')}}" style="color:gray">Logout</a>
                </li>
            @else
            <li><a href="{{route('auth.login')}}">Login</a></li>
            <li><a href="{{ route('registration') }}">
                Register
            </a></li>
            @endif
        </ul>
    </nav>

    @if(auth()->check())
        <p style="margin-left:20px"><a href="{{ route('create_image') }}" style="color: green;">upload image</a></p>
    @endif

    <main class="container-fluid" style="padding-top: 0px">
        <br>
        <div>
            <div style="float: left; width: 15%; max-width: 300px;min-width:150px;">
                @foreach ($all_tags as $tag)
                    <a href="{{ route('tag', $tag->name )}}"><p>{{ $tag->name }} ({{$tag->images_count}})</p></a>
                @endforeach
            </div>
            <div style="float: left; width: 80%;">
                @yield('content')
            </div>
    </main>
</body>
</html>