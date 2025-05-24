@extends('layout.layout1')

@section('title', 'Student Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Student Details</h1>
        <a href="{{ route('student.index') }}" class="btn btn-primary">
            <i class='bx bx-arrow-back'></i> Back to List
        </a>
    </div>
    
    <div class="student-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-image-container">
                    @if($student->image_path)
                        <img src="{{ asset($student->image_path) }}" alt="Student Photo" class="student-image">
                    @else
                        <div class="no-image-container">
                            <i class='bx bx-user'></i>
                            <span>No image available</span>
                        </div>
                    @endif
                </div>
                
                <div class="student-id-badge">
                    <i class='bx bx-id-card'></i>
                    <span>{{ $student->studentid }}</span>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="student-details">
                    <div class="detail-group">
                        <h2 class="student-name">{{ $student->fname }} {{ $student->mname }} {{ $student->lname }}</h2>
                    </div>
                    
                    <div class="detail-group">
                        <label><i class='bx bx-map'></i> Address</label>
                        <p>{{ $student->address }}</p>
                    </div>
                    
                    <div class="detail-group">
                        <label><i class='bx bx-phone'></i> Contact Number</label>
                        <p>{{ $student->contactno }}</p>
                    </div>
                    
                    <div class="detail-group">
                        <label><i class='bx bx-envelope'></i> Email</label>
                        <p>{{ $student->email }}</p>
                    </div>
                    
                    @if($student->userAccount)
                        <div class="account-section">
                            <h3 class="section-title"><i class='bx bx-user-circle'></i> User Account</h3>
                            
                            <div class="detail-group">
                                <label><i class='bx bx-user'></i> Username</label>
                                <p>{{ $student->userAccount->username }}</p>
                            </div>
                            
                            <div class="detail-group">
                                <label><i class='bx bx-check-circle'></i> Status</label>
                                <p>
                                    <span class="badge badge-{{ strtolower($student->userAccount->status) === 'active' ? 'success' : (strtolower($student->userAccount->status) === 'inactive' ? 'danger' : 'warning') }}">
                                        {{ $student->userAccount->status }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    @endif
                    
                    <div class="action-buttons">
                        <a href="/student/{{$student->id}}/edit" class="btn btn-warning">
                            <i class='bx bx-edit'></i> Edit Student
                        </a>
                        <form action="/student/{{$student->id}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">
                                <i class='bx bx-trash'></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .student-profile {
        padding: 20px;
    }
    
    .profile-image-container {
        margin-bottom: 20px;
        text-align: center;
    }
    
    .student-image {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: 4px solid var(--primary-light);
    }
    
    .no-image-container {
        width: 200px;
        height: 200px;
        background-color: var(--primary-lighter);
        border-radius: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--gray-medium);
        margin: 0 auto;
        border: 4px solid var(--primary-light);
    }
    
    .no-image-container i {
        font-size: 64px;
        margin-bottom: 10px;
    }
    
    .student-id-badge {
        background-color: var(--primary);
        color: white;
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 30px;
        font-weight: 600;
        font-size: 14px;
        margin: 0 auto;
        gap: 8px;
    }
    
    .student-id-badge i {
        font-size: 18px;
    }
    
    .student-details {
        padding: 0 20px;
    }
    
    .student-name {
        font-size: 24px;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid var(--primary-light);
    }
    
    .detail-group {
        margin-bottom: 15px;
    }
    
    .detail-group label {
        display: block;
        color: var(--gray-medium);
        font-size: 14px;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .detail-group p {
        font-size: 16px;
        margin: 0;
        color: var(--dark);
        font-weight: 500;
    }
    
    .account-section {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid var(--gray-light);
    }
    
    .section-title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        color: var(--dark);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
    }
    
    .badge-success {
        background-color: var(--success);
        color: white;
    }
    
    .badge-warning {
        background-color: var(--warning);
        color: var(--dark);
    }
    
    .badge-danger {
        background-color: var(--danger);
        color: white;
    }
    
    .action-buttons {
        margin-top: 30px;
        display: flex;
        gap: 10px;
    }
</style>
@endsection