@extends('layouts/layout')
@section('content')

@if(session()->has('confirm'))
    <p>
        Are you sure? <a style="color:red;" href="{{route('image.destroy', $image->id)}}">yes</a>
    </p>
@endif

<div>
    <img src="{{ url('images/'.$image->name) }}" style="max-width:100%">
</div>
<br>
<div>
    @if(auth()->id() == $image->user->id)
    <p>
        <a href="{{route('image.edit', $image->id)}}"><span style="color: orange">Edit</span></a>
        <a href="{{route('image.destroy.confirm', $image->id)}}"><span style="color: red">Delete</span></a>
        @if(session()->has('confirm'))
            <p>
                Are you sure? <a style="color:red;" href="{{route('image.destroy', $image->id)}}">yes</a>
            </p>
        @endif
    </p>
    @endif

    <p>
        Uploader: <a href="{{route('profile', $image->user->id)}}">{{ $image->user->name }}</a>
    </p>

    <p>Date: {{ $image->created_at}}</p>

    <p>
        Tags: 
        @foreach ($image->tags as $tag)
            <a href="{{ route('tag', $tag->name) }}">{{$tag->name}} </a>
        @endforeach
    </p>
    <p>{{$image->description}}</p>
</div>

@endsection