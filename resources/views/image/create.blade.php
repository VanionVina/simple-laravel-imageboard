@extends('layouts/layout')
@section('content')

    <form method="POST" action="{{ route('store_image') }}" enctype="multipart/form-data">
    @csrf
        <label for="image">Select image
            <input type="file" name="image">
        </label>
        <br>
        <div class="grid" style="width:50%">
            <div>
                <label for="description">Image description</label>
                <textarea type="text" name="description" style="max-width: 100%;width:90%"></textarea>
            </div>
            <div>
                <label for="tags">Tags</label>
                <textarea type="text" name="tags" style="max-width: 100%;width:90%"></textarea>
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