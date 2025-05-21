@extends('layout.layout1')

@section('title')
    Add Student Form
@endsection

@section('content')

<style>
    .error-messages {
        color: #b00020;
        background-color: #fdecea;
        border: 1px solid #f5c6cb;
        padding: 10px 15px;
        border-radius: 5px;
        margin-top: 15px;
        list-style: none;
    }

    .error-messages li {
        margin-left: 20px;
    }

    input[type="text"] {
        margin-bottom: 10px;
        padding: 6px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="text"]:focus {
        border-color: #007bff;
    }

    input[type="submit"] {
        margin-top: 10px;
        padding: 6px 12px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>


<div class="container mt-5">
    <div class="form-container">
        <h2>Add Student Form</h2>
        <form action="/student" method="POST">
                @csrf
            Student ID: <input type="text" name="studentid" value="{{old('studentid')}}"><br>
            First Name: <input type="text" name="fname" value="{{old('fname')}}"><br>
            Middle Name: <input type="text" name="mname" value="{{old('mname')}}"><br>
            Last Name: <input type="text" name="lname" value="{{old('lname')}}"><br>
            Address: <input type="text" name="address" value="{{old('address')}}"><br>
            Contact Number: <input type="text" name="contactno" value="{{old('contactno')}}">
            <input type="submit" value="Save">
        </form>
        @if($errors->any())
    <ul class="error-messages">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
    </div>
</div>
@endsection

