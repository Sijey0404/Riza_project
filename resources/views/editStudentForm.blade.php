@extends('layout.layout1')

@section('title')
    Edit Student Form
@endsection

@section('content')


<div class="container mt-5">
    <div class="form-container">
        <h2>Edit Student Form</h2>
        <form action="/student/{{$student->id}}" method="POST">
                @csrf
                @method('PUT')
            Student ID: <input type="text" name="studentid" value="{{$student->studentid}}"><br>
            First Name: <input type="text" name="fname" value="{{$student->fname}}"><br>
            Middle Name: <input type="text" name="mname" value="{{$student->mname}}"><br>
            Last Name: <input type="text" name="lname" value="{{$student->lname}}"><br>
            Address: <input type="text" name="address" value="{{$student->address}}"><br>
            Contact Number: <input type="text" name="contactno" value="{{$student->contactno}}">
            <input type="submit" value="Update">
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

