@extends('layouts/auth')
@section('content')
    <h1 style="text-align: center">Registration</h1>
    @if ($errors->any())
    <div style="text-align: center">
        @foreach ($errors->all() as $error)
            <p style="color:red;">{{$error}}</p>
        @endforeach
    </div>
    @endif
    <div style="display: flex; justify-content: center;">
        <form method="POST" action="{{ route('registration.store') }}">
            @csrf

            <!--
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email">
            </div>
            -->

            <div style="position: flex">
                <div>
                        <label for="name" style="margin-bottom:20px">Name</label>
                        <input type="text" name="name" style="margin-bottom: 20px;">
                </div>
                <div>
                        <label for="password" style="margin-bottom:20px">Password</label>
                        <input type="password" name="password" style="margin-bottom:20px">
                </div>
                <div>
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" name="password_confirmation">
                </div>
            </div>
            <div style="margin-top: 20px">
                <button style="cursor:pointer; width: 200px;" type="submit">Register</button>
            </div>
        </form>
    </div>
@endsection