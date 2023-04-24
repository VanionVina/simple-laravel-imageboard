@extends('layouts/layout')
@section('content')

<div style="display:flex;flex-wrap:wrap">
    @foreach ($images as $image)
        <div style="max-width: 400px;margin:10px">
            <a href="{{ route('show_image', $image->id) }}">
                <img src="{{ url('images/'.$image->name) }}" style="max-width: 200px; max-height: 200px">
            </a>
        </div>
    @endforeach
</div>

@endsection