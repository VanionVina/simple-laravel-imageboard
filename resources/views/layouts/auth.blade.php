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
    <main style="padding-top: 0px">
        @yield('content')
    </main>
</body>
</html>