@extends('layouts/layout')
@section('content')

    <div>
        <img src="{{ url('images/'.$image->name) }}" style="max-height:600px">
    </div>
    <form method="POST" action="{{ route('image.update', $image->id) }}">
    @csrf
        <div class="grid" style="width:50%">
            <input type="hidden" value="{{$image->id}}" name="image_id">
            <div>
                <label for="description">Image description</label>
                <textarea type="text" name="description" style="max-width: 100%;width:90%">{{$image->description}}</textarea>
            </div>
            <div>
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" style="max-width: 100%;width:90%">@foreach($image->tags as $tag){{$tag->name}} @endforeach</textarea>
            </div>
        </div>
        <br>
        <button type="submit" style="width: 100px">Upload</button>
    </form>

    @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li style="color: red">{{$error}}</li>
        @endforeach
        </ul>
    @endif

@endsection