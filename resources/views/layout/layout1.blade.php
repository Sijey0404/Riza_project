<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Project')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons for icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        :root {
            --primary: #3f8efc;
            --primary-dark: #2e6edb;
            --primary-light: #e3f2fd;
            --primary-lighter: #f5faff;
            --secondary: #bbdefb;
            --dark: #1f2937;
            --gray-dark: #374151;
            --gray-medium: #6c757d;
            --gray-light: #e5e7eb;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #4caf50;
            --white: #ffffff;
            --shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 4px 12px rgba(0, 0, 0, 0.15);
            --border-radius: 8px;
            --transition: all 0.2s ease-in-out;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: var(--dark);
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--white);
            box-shadow: var(--shadow);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 100;
            transition: var(--transition);
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid var(--gray-light);
        }
        
        .sidebar-logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .sidebar-logo i {
            font-size: 28px;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--gray-dark);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: var(--transition);
            gap: 10px;
            border-left: 3px solid transparent;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: var(--primary-lighter);
            color: var(--primary);
            border-left-color: var(--primary);
        }
        
        .sidebar-menu a i {
            font-size: 18px;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            transition: var(--transition);
        }
        
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--gray-dark);
            font-size: 24px;
            cursor: pointer;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .user-info img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        /* Page title */
        .page-title {
            color: var(--dark);
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        /* Card styles */
        .card {
            background-color: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 20px;
            margin-bottom: 20px;
            transition: var(--transition);
        }
        
        .card:hover {
            box-shadow: var(--shadow-lg);
        }
        
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
        }
        
        /* Buttons */
        .btn {
            padding: 8px 16px;
            border-radius: var(--border-radius);
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .btn-info {
            background-color: var(--info);
            color: var(--white);
        }
        
        .btn-info:hover {
            background-color: #3a9a40;
        }
        
        .btn-warning {
            background-color: var(--warning);
            color: var(--dark);
        }
        
        .btn-warning:hover {
            background-color: #e6af06;
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: var(--white);
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        /* Table */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--gray-light);
        }
        
        th {
            background-color: var(--primary-light);
            color: var(--dark);
            font-weight: 600;
            white-space: nowrap;
        }
        
        th.highlight-column {
            background-color: var(--secondary);
        }
        
        tr:nth-child(even) {
            background-color: var(--primary-lighter);
        }
        
        tr:hover {
            background-color: var(--primary-light);
        }
        
        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .badge-success {
            background-color: var(--success);
            color: var(--white);
        }
        
        .badge-warning {
            background-color: var(--warning);
            color: var(--dark);
        }
        
        .badge-danger {
            background-color: var(--danger);
            color: var(--white);
        }
        
        /* Flash message */
        .flash-message {
            background-color: #e0f7e9;
            color: #166534;
            border: 1px solid #a7f3d0;
            padding: 12px 20px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: var(--border-radius);
            font-weight: 500;
            animation: fadeOut 5s forwards;
        }
        
        @keyframes fadeOut {
            0% { opacity: 1; }
            70% { opacity: 1; }
            100% { opacity: 0; }
        }
        
        /* Info banner */
        .info-banner {
            background-color: var(--primary-light);
            border-left: 4px solid var(--primary);
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: var(--border-radius);
            font-size: 14px;
            color: var(--dark);
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            gap: 5px;
        }
        
        .pagination a {
            padding: 6px 12px;
            background-color: var(--white);
            color: var(--primary);
            border-radius: 4px;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
            border: 1px solid var(--primary-light);
        }
        
        .pagination a:hover {
            background-color: var(--primary-light);
        }
        
        .pagination span {
            padding: 6px 12px;
            background-color: var(--primary);
            color: var(--white);
            border-radius: 4px;
            font-weight: 500;
        }
        
        /* Student Images */
        .student-thumbnail {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid var(--primary-light);
        }
        
        .no-image-placeholder {
            width: 40px;
            height: 40px;
            background-color: var(--gray-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--gray-medium);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
        }
        
        /* Footer */
        .footer {
            text-align: center;
            padding: 20px 0;
            color: var(--gray-medium);
            font-size: 14px;
            border-top: 1px solid var(--gray-light);
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class='bx bx-book-alt'></i>
                <span>Student System</span>
            </div>
        </div>
        
        <div class="sidebar-menu">
            <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <i class='bx bxs-dashboard'></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ url('/profile') }}" class="{{ request()->is('profile') ? 'active' : '' }}">
                <i class='bx bxs-user'></i>
                <span>Profile</span>
            </a>
            <a href="{{ route('student.index') }}" class="{{ request()->is('student*') ? 'active' : '' }}">
                <i class='bx bxs-graduation'></i>
                <span>Students</span>
            </a>
            <a href="{{ url('/students') }}" class="{{ request()->is('students') ? 'active' : '' }}">
                <i class='bx bx-list-ul'></i>
                <span>Student List</span>
            </a>
            <a href="{{ url('/conditional') }}" class="{{ request()->is('conditional*') ? 'active' : '' }}">
                <i class='bx bx-code-alt'></i>
                <span>Conditional</span>
            </a>
            <a href="{{ url('/about-us') }}" class="{{ request()->is('about-us') ? 'active' : '' }}">
                <i class='bx bx-info-circle'></i>
                <span>About Us</span>
            </a>
            <a href="{{ url('/contact-us') }}" class="{{ request()->is('contact-us') ? 'active' : '' }}">
                <i class='bx bx-envelope'></i>
                <span>Contact Us</span>
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="width: 100%; text-align: left; margin-top: 20px;">
                    <i class='bx bx-log-out'></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>
    
    <!-- Main Content -->
    <main class="main-content">
        <div class="top-header">
            <button class="menu-toggle" id="menu-toggle">
                <i class='bx bx-menu'></i>
            </button>
            <div class="user-info">
                <i class='bx bxs-user-circle' style="font-size: 24px;"></i>
                <span>{{ session('user.username') ?? 'User' }}</span>
            </div>
        </div>
        
        <div class="content-wrapper">
            @if(session('message'))
                <div class="flash-message" id="flash-message">
                    {{ session('message') }}
                </div>
            @endif
            
            @yield('content')
        </div>
        
        <footer class="footer">
            <p>© 2025 Student Management System. All rights reserved.</p>
        </footer>
    </main>
    
    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.querySelector('.sidebar');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
            });
        }
        
        // Flash message fade out
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 5000);
        }
    </script>
</body>
</html>
