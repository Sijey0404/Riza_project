@extends('layout.layout1') 

@section('title', 'Login Form')

@section('content')
    <form action="/login " method="GET">
        @csrf
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Log-in">
    </form>
@endsection