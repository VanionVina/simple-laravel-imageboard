@extends('layouts/auth')
@section('content')
    <h1 style="text-align: center">Login</h1>
    
    @if ($errors->any())
        <div style="text-align: center">
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{$error}}</p>
            @endforeach
        </div>
    @elseif(session()->has('message'))
        <div style="text-align: center">
            <p style="color:red;">{{session()->get('message')}}</p>
        </div>
    @endif

    <div style="display: flex; justify-content: center;">
        <form method="POST" action="{{ route('auth.login.post') }}">
            @csrf
            <div style="position: flex">
                <div style="float:left; width:50%">
                    <label for="name" style="margin-bottom:20px">Name:
                    </label>
                    <label for="password">Password:
                    </label>
                </div>
                <div>
                        <input type="text" name="name" style="margin-bottom: 20px;">
                        <input type="password" name="password">
                </div>
            </div>
            <div style="margin-top: 20px">
                <button style="cursor:pointer; width: 200px; margin-left:50px" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection