@extends('layout.layout1')

@section('title', 'Edit Student')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Edit Student</h1>
        <a href="{{ route('student.index') }}" class="btn btn-primary">
            <i class='bx bx-arrow-back'></i> Back to List
        </a>
    </div>
    
    <form action="/student/{{$student->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="studentid">Student ID</label>
                    <input type="text" id="studentid" name="studentid" class="form-control" value="{{$student->studentid}}" readonly>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fname">First Name</label>
                        <input type="text" id="fname" name="fname" class="form-control" value="{{$student->fname}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="mname">Middle Name</label>
                        <input type="text" id="mname" name="mname" class="form-control" value="{{$student->mname}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="lname">Last Name</label>
                        <input type="text" id="lname" name="lname" class="form-control" value="{{$student->lname}}">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{$student->address}}">
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="contactno">Contact Number</label>
                        <input type="text" id="contactno" name="contactno" class="form-control" value="{{$student->contactno}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$student->email}}">
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="student_image">Student Photo</label>
                    
                    <div class="current-image-container">
                        <p class="image-label">Current image:</p>
                        @if($student->image_path)
                            <img src="{{ asset($student->image_path) }}" alt="Student Photo" class="current-image">
                        @else
                            <div class="no-image-container">
                                <i class='bx bx-user'></i>
                                <span>No image uploaded</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="image-upload-container">
                        <p class="upload-label">Upload new image:</p>
                        <div class="preview-container" id="preview-container">
                            <img id="image_preview" src="#" alt="New Image Preview" style="display: none;">
                            <div id="preview_placeholder">
                                <i class='bx bx-image-add'></i>
                                <span>No new image selected</span>
                            </div>
                        </div>
                        <div class="file-input-wrapper">
                            <input type="file" name="student_image" id="student_image" class="file-input" accept="image/*" onchange="previewImage(this)">
                            <label for="student_image" class="file-input-label">
                                <i class='bx bx-upload'></i> Choose New Image
                            </label>
                        </div>
                        <small class="text-muted"><i class='bx bx-info-circle'></i> Leave empty to keep current image</small>
                    </div>
                </div>
            </div>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="error-list">
                    @foreach($errors->all() as $error)
                        <li><i class='bx bx-error-circle'></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class='bx bx-save'></i> Update Student
            </button>
        </div>
    </form>
</div>

<style>
    .card {
        padding: 0;
        overflow: hidden;
    }
    
    .card-header {
        padding: 15px 20px;
        background-color: var(--white);
        border-bottom: 1px solid var(--gray-light);
    }
    
    form {
        padding: 20px;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-row {
        display: flex;
        margin: 0 -10px 20px;
        flex-wrap: wrap;
    }
    
    .form-row .form-group {
        padding: 0 10px;
        margin-bottom: 0;
    }
    
    label {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
        color: var(--dark);
    }
    
    .form-control {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid var(--gray-light);
        border-radius: 4px;
        font-size: 14px;
        transition: var(--transition);
    }
    
    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(63, 142, 252, 0.2);
        outline: none;
    }
    
    .form-control[readonly] {
        background-color: var(--primary-lighter);
        cursor: not-allowed;
    }
    
    .text-muted {
        color: var(--gray-medium);
        font-size: 12px;
        margin-top: 4px;
        display: block;
    }
    
    .current-image-container {
        margin-bottom: 20px;
    }
    
    .image-label, .upload-label {
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
        color: var(--gray-dark);
    }
    
    .current-image {
        max-width: 100%;
        max-height: 180px;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    
    .no-image-container {
        width: 180px;
        height: 180px;
        background-color: var(--primary-lighter);
        border-radius: 6px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: var(--gray-medium);
    }
    
    .no-image-container i {
        font-size: 48px;
        margin-bottom: 10px;
    }
    
    .image-upload-container {
        margin-top: 20px;
    }
    
    .preview-container {
        width: 180px;
        height: 180px;
        border: 2px dashed var(--gray-light);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        overflow: hidden;
        background-color: var(--primary-lighter);
    }
    
    .preview-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
        border-radius: 4px;
    }
    
    #preview_placeholder {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: var(--gray-medium);
    }
    
    #preview_placeholder i {
        font-size: 36px;
        margin-bottom: 8px;
    }
    
    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }
    
    .file-input {
        position: absolute;
        font-size: 100px;
        opacity: 0;
        right: 0;
        top: 0;
        cursor: pointer;
    }
    
    .file-input-label {
        display: inline-block;
        padding: 8px 15px;
        background-color: var(--primary);
        color: var(--white);
        border-radius: 4px;
        cursor: pointer;
        transition: var(--transition);
    }
    
    .file-input-label:hover {
        background-color: var(--primary-dark);
    }
    
    .alert-danger {
        background-color: #fdecea;
        border: 1px solid #f5c6cb;
        color: #b00020;
        padding: 15px;
        border-radius: 4px;
        margin: 15px 0;
    }
    
    .error-list {
        margin: 0;
        padding-left: 20px;
    }
    
    .error-list li {
        margin-bottom: 5px;
    }
    
    .form-actions {
        padding-top: 20px;
        border-top: 1px solid var(--gray-light);
        margin-top: 20px;
    }
    
    /* Responsive grid */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -15px;
    }
    
    .col-md-4, .col-md-6, .col-md-8 {
        padding: 0 15px;
        width: 100%;
    }
    
    @media (min-width: 768px) {
        .col-md-4 {
            width: 33.333333%;
        }
        .col-md-6 {
            width: 50%;
        }
        .col-md-8 {
            width: 66.666667%;
        }
    }
</style>

<script>
function previewImage(input) {
    const preview = document.getElementById('image_preview');
    const placeholder = document.getElementById('preview_placeholder');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        };
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
        placeholder.style.display = 'flex';
    }
}
</script>
@endsection

