@extends('layout.layout1')

@section('title')
    Student Details
@endsection
@section('content')

<div class="container mt-5">
    <div class="student-card">
        <h2>Student Details</h2>
        
            {{-- {{$student->studentid}}<br>
            {{$student->fname}}<br>
            {{$student->mname}}<br>
            {{$student->lname}}<br>
            {{$student->address}}<br>
            {{$student->contactno}} --}}
        

        <div class="student-info">
            <p><strong>Student ID:</strong> {{ $student->studentid }}</p>
            <p><strong>First Name:</strong> {{ $student->fname }}</p>
            <p><strong>Middle Name:</strong> {{ $student->mname }}</p>
            <p><strong>Last Name:</strong> {{ $student->lname }}</p>
            <p><strong>Address:</strong> {{ $student->address }}</p>
            <p><strong>Contact Number:</strong> {{ $student->contactno }}</p>
        </div>

        {{-- <a href="/manageStudent" class="back-button"></a> --}}
    </div>
</div>
@endsection