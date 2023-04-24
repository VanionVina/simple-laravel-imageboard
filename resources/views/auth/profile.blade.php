@extends('layouts/auth')
@section('content')
    <h1 style="text-align: center">Images of {{$user->name}}</h1>
    <div style="display:flex;flex-wrap:wrap;margin:20px">
        @foreach ($user->images as $image)
            <div style="max-width: 400px;margin:10px">
                <a href="{{ route('show_image', $image->id) }}">
                    <img src="{{ url('images/'.$image->name) }}" style="max-width: 200px; max-height: 200px">
                </a>
            </div>
        @endforeach
    </div>
@endsection