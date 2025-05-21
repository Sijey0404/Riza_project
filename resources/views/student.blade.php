@extends('layout.layout1')

@section('title', 'Student')

@section('content')

<style>
    body {
        background-color: #f9fbfd; /* Light academic blue */
        font-family: 'Segoe UI', sans-serif;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        background-color: #3f8efc;
        color: white;
        padding: 15px;
        margin: 0 0 20px;
        font-size: 26px;
    }

    .add-student-container {
        text-align: center;
        margin: 20px 0;
    }

    .add-student-btn {
        background-color: #3f8efc;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .add-student-btn:hover {
        background-color: #2e6edb;
    }

    #flash-message {
        background-color: #e0f7e9;
        color: #1b5e20;
        border: 1px solid #a5d6a7;
        padding: 10px;
        margin: 10px auto;
        width: 60%;
        text-align: center;
        border-radius: 4px;
    }

    .table-container {
        width: 90%;
        margin: auto;
        background-color: white;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #e0e0e0;
        text-align: left;
    }

    th {
        background-color: #e3f2fd; /* Soft blue */
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f5faff;
    }

    tr:hover {
        background-color: #d0e6ff;
    }

    .btn {
        padding: 6px 10px;
        font-size: 13px;
        border-radius: 4px;
        font-weight: 600;
        text-decoration: none;
        margin-right: 5px;
    }

    .btn-info {
        background-color: #4caf50;
        color: white;
    }

    .btn-warning {
        background-color: #ff9800;
        color: white;
    }

    .btn-danger {
        background-color: #f44336;
        color: white;
    }

    .btn:hover {
        opacity: 0.9;
    }

    .pagination {
        margin-top: 15px;
        text-align: center;
    }

    .pagination a {
        margin: 0 5px;
        text-decoration: none;
        color: #3f8efc;
        padding: 6px 10px;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #e0ecff;
    }
</style>


<h1>Student Information</h1>

<div class="add-student-container">
    <a href="/student/create" class="add-student-btn">➕ Add Student</a>

    {{-- @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif --}}

    @if(session("message"))
        <div id="flash-message">
            <strong>{{ session("message") }}</strong>
        </div>
    @endif
</div>

<div class="table-container">
    <table>
        <tr>
            <th>Student ID</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>

        @if($students && $students->count() > 0)
            @foreach($students as $stud)
                <tr>
                    <td>{{ $stud->studentid }}</td>
                    <td>{{ $stud->lname }}, {{ $stud->fname }} {{ $stud->mname }}</td>
                    <td>{{ $stud->address }}</td>
                    <td>{{ $stud->contactno }}</td>
                    <td>
                        <a href="/student/{{$stud->id}}" class="btn btn-info">🔍 View Details</a>
                        <a href="/student/{{$stud->id}}/edit" class="btn btn-warning">✏️ Edit</a>
                        <form action="/student/{{$stud->id}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    {{ $students->links() }}
</div>

<script>
    
    setTimeout(function () {
        var flash = document.getElementById('flash-message');
        if (flash) {
            flash.style.opacity = '0';
            setTimeout(() => flash.remove(), 1000);
        }
    }, 5000);
</script>

@endsection







{{-- @extends('layout.layout1')

@section('title', 'Student')

@section('content')

<style>
    /* 🌸 Soft pastel background */
    body {
        background-color: #fffaf3; /* Light cream */
        color: #333;
        font-family: 'Poppins', sans-serif;
    }

    /* 🌈 Elegant Header */
    h1 {
        color: white;
        text-align: center;
        padding: 15px;
        background: linear-gradient(to right, #ffb6c1, #ffc3a0);
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* 📌 Add Student Button */
    .add-student-container {
        text-align: center;
        margin-bottom: 15px;
    }

    .add-student-btn {
        background: linear-gradient(to right, #ffb6c1, #ffa07a);
        color: white;
        padding: 12px 18px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .add-student-btn:hover {
        background: linear-gradient(to right, #ff99aa, #ff8866);
        transform: scale(1.05);
    }

    /* 🌈 Stylish Table Container */
    .table-container {
        width: 90%;
        margin: auto;
        overflow-x: auto;
        border-radius: 10px;
        box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.1);
        background-color: white;
        padding: 20px;
    }

    /* 🦓 Zebra-striped pastel table */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        border-radius: 8px;
        overflow: hidden;
    }

    /* Table headers */
    th {
        background-color: #ff99aa;
        color: white;
        padding: 12px;
        text-align: left;
        font-size: 16px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Alternating zebra row colors */
    tr:nth-child(odd) {
        background-color: #ffe6ea; /* Soft pink */
    }

    tr:nth-child(even) {
        background-color: #fff3e6; /* Light peach */
    }

    /* Hover effect on rows */
    tr:hover {
        background-color: #ffccd5; /* Soft rosy pink */
        transition: 0.3s;
    }

    /* Table cells */
    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: left;
        font-size: 14px;
    }

    /* 🎨 Buttons in the actions column */
    .btn {
        padding: 8px 12px;
        font-size: 14px;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-info {
        background-color: #77c8c4;
        color: white;
    }

    .btn-info:hover {
        background-color: #5fa9a3;
        transform: scale(1.05);
    }

    .btn-warning {
        background-color: #f4b400;
        color: white;
    }

    .btn-warning:hover {
        background-color: #d89c00;
        transform: scale(1.05);
    }

    .btn-danger {
        background-color: #ff6b6b;
        color: white;
    }

    .btn-danger:hover {
        background-color: #e65c5c;
        transform: scale(1.05);
    }

    /* 📌 Pagination */
    .pagination {
        text-align: center;
        margin-top: 20px;
    }

    .pagination a {
        color: #d63384;
        text-decoration: none;
        padding: 8px 12px;
        border-radius: 4px;
        transition: 0.3s;
    }

    .pagination a:hover {
        background-color: #ffb3d9;
        transform: scale(1.1);
    }

</style>


<h1>Student Information</h1>


    
    <div class="add-student-container">
        <a href="/student/create" class="add-student-btn">➕ Add Student</a>
        @if(session("message"))
            <strong>{{session("message")}}</strong>
        @endif
    </div>

        <table>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>

            @if($students && $students->count() > 0)
                @foreach($students as $stud)
                    <tr>
                        <td>{{ $stud->studentid }}</td>
                        <td>{{ $stud->lname }}, {{ $stud->fname }} {{ $stud->mname }}</td>
                        <td>{{ $stud->address }}</td>
                        <td>{{ $stud->contactno }}</td>
                        <td>
                            <a href="/student/{{$stud->id}}" class="btn btn-info">🔍 View Details</a>
                            <a href="student/{{$stud->id}}/edit" class="btn btn-warning">✏️ Edit</a>
                            <form action="/student/{{$stud->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                @endforeach
            @endif
        </table>
        {{$students->links()}}
    </div>

@endsection

 --}}
