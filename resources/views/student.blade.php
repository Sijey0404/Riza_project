@extends('layout.layout1')

@section('title', 'Student Information')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Student Information</h1>
        <a href="/student/create" class="btn btn-primary">
            <i class='bx bx-plus'></i> Add Student
        </a>
    </div>

    <div class="info-banner">
        <strong><i class='bx bx-info-circle'></i> Note:</strong> Each student is automatically assigned a user account. The student's email is used as the username, and the default password follows the format: StudentID + FirstName (e.g., S-25-1John).
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Contact Info</th>
                    <th class="highlight-column">Username</th>
                    <th class="highlight-column">Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($students && $students->count() > 0)
                    @foreach($students as $stud)
                        <tr>
                            <td>
                                @if($stud->image_path)
                                    <img src="{{ asset($stud->image_path) }}" alt="Student Photo" class="student-thumbnail">
                                @else
                                    <div class="no-image-placeholder">
                                        <i class='bx bx-user'></i>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $stud->studentid }}</td>
                            <td>{{ $stud->lname }}, {{ $stud->fname }} {{ $stud->mname }}</td>
                            <td>
                                <div><i class='bx bx-phone'></i> {{ $stud->contactno }}</div>
                                <div><i class='bx bx-envelope'></i> {{ $stud->email }}</div>
                            </td>
                            <td>{{ $stud->username ?? 'N/A' }}</td>
                            <td>
                                @if($stud->status)
                                    <span class="badge badge-{{ strtolower($stud->status) === 'active' ? 'success' : (strtolower($stud->status) === 'inactive' ? 'danger' : 'warning') }}">
                                        {{ $stud->status }}
                                    </span>
                                @else
                                    <span>N/A</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="/student/{{$stud->id}}" class="btn btn-info">
                                        <i class='bx bx-show'></i>
                                    </a>
                                    <a href="/student/{{$stud->id}}/edit" class="btn btn-warning">
                                        <i class='bx bx-edit'></i>
                                    </a>
                                    <form action="/student/{{$stud->id}}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">No students found</td>
                    </tr>
                @endif
            </tbody>
        </table>
        
        <div class="pagination-container">
            {{ $students->links() }}
        </div>
    </div>
</div>

<style>
    .action-buttons {
        display: flex;
        gap: 5px;
    }
    
    .action-buttons .btn {
        padding: 6px 10px;
    }
    
    .badge-active, .badge-success {
        background-color: var(--success);
        color: white;
    }
    
    .badge-inactive, .badge-danger {
        background-color: var(--danger);
        color: white;
    }
    
    .badge-pending, .badge-warning {
        background-color: var(--warning);
        color: var(--dark);
    }
    
    .pagination-container {
        margin-top: 20px;
    }
</style>

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
