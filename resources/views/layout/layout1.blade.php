<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Project')</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #1f2937;
        }
    
        /* 🌐 Navbar */
        .navbar {
            background-color: #111827;
            padding: 14px 24px;
            display: flex;
            justify-content: flex-end;
            flex-wrap: wrap;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
    
        .navbar a {
            color: #e5e7eb;
            text-decoration: none;
            margin-left: 12px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 15px;
            background-color: #1f2937;
            transition: background-color 0.3s, transform 0.2s;
        }
    
        .navbar a:hover {
            background-color: #374151;
            transform: translateY(-1px);
        }
    
        /* 🧱 Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 24px;
            flex-grow: 1;
        }
    
        .header {
            background-color: #2563eb;
            color: #ffffff;
            padding: 24px;
            border-radius: 10px;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
    
        /* 📋 Table */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.04);
        }
    
        th, td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
    
        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
    
        td {
            color: #4b5563;
        }
    
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
    
        tr:hover {
            background-color: #f3f4f6;
        }
    
        /* 🎯 Buttons */
        .btn {
            padding: 8px 14px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-right: 6px;
            transition: 0.2s ease-in-out;
        }
    
        .btn-info {
            background-color: #10b981;
            color: white;
        }
    
        .btn-info:hover {
            background-color: #059669;
            transform: scale(1.03);
        }
    
        .btn-warning {
            background-color: #f59e0b;
            color: white;
        }
    
        .btn-warning:hover {
            background-color: #d97706;
            transform: scale(1.03);
        }
    
        .btn-danger {
            background-color: #ef4444;
            color: white;
        }
    
        .btn-danger:hover {
            background-color: #dc2626;
            transform: scale(1.03);
        }
    
        /* 📎 Pagination */
        .pagination {
            text-align: center;
            margin-top: 24px;
        }
    
        .pagination a {
            padding: 10px 14px;
            margin: 0 6px;
            background-color: #e5e7eb;
            color: #1f2937;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
    
        .pagination a:hover {
            background-color: #cbd5e1;
        }
    
        /* ✅ Flash message */
        #flash-message {
            background-color: #e0fbe3;
            color: #166534;
            border: 1px solid #a7f3d0;
            padding: 12px 20px;
            margin: 20px auto;
            text-align: center;
            border-radius: 6px;
            font-weight: 500;
            width: fit-content;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
    
        /* 🦶 Footer */
        .footer {
            background-color: #111827;
            color: #d1d5db;
            text-align: center;
            padding: 16px 0;
            font-size: 14px;
            margin-top: auto;
        }
    
        /* 📱 Responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: center;
            }
    
            .navbar a {
                margin: 8px 0;
            }
    
            table {
                font-size: 14px;
            }
        }
    </style>
    

</head>
<body>
    <!-- Navbar Section -->
    @section('navbar')
    <div class="navbar">
        <a href="{{ url('/profile') }}">Profile</a>
        <a href="{{ url('/about-us') }}">About Us</a>
        <a href="{{ url('/contact-us') }}">Contact Us</a>
        <a href="{{ url('/conditional') }}">Conditional Statement</a>
        <a href="{{ url('/students') }}">Student List</a>
        <a href="{{ route('student.index') }}">Student Information</a>
        {{-- <a href="{{ url('/try') }}">Redirect Me</a> --}}
        
    </div>
    @show

    <!-- Main Content Section -->
    <div class="container">
        @yield('content') <!-- This is where the content will be injected in views extending this layout -->
    </div>

    <!-- Footer Section -->
    @section('footer')
    <footer class="footer">
        <p>© 2025 Laravel Project. All rights reserved.</p>
    </footer>
    @show
</body>
</html>
