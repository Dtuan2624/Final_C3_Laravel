<!DOCTYPE html>
<html>
<head>
    <title>CMS</title>

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f4f6f9; }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #343a40;
        }
        .sidebar a {
            text-decoration: none;
            color: #ccc;
            padding: 10px;
            display: block;
            border-radius: 5px;
        }
        .sidebar a:hover, .active-menu {
            background: #0d6efd;
            color: white !important;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .pagination {
            margin-bottom: 0;
        }
        .pagination svg {
            width: 14px;
            height: 14px;
        }
        svg {
        width: 16px !important;
        height: 16px !important;
        }
        .pagination .page-link {
        border: none !important;
        background: none !important;
        color: #0d6efd;
        }

        .pagination .page-item.active .page-link {
            font-weight: bold;
            text-decoration: underline;
            background: none !important;
            border: none !important;
        }

        .pagination .page-link:hover {
            background: none !important;
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar p-3">
        <h4 class="text-white">Admin</h4>

        <a href="/" class="{{ request()->is('/') ? 'active-menu' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="{{ route('courses.index') }}" class="{{ request()->is('courses*') ? 'active-menu' : '' }}">
            <i class="bi bi-book"></i> Khóa học
        </a>

        <a href="{{ route('lessons.index') }}" class="{{ request()->is('lessons*') ? 'active-menu' : '' }}">
            <i class="bi bi-play-circle"></i> Bài học
        </a>

        <a href="{{ route('enrollments.index') }}" class="{{ request()->is('enrollments*') ? 'active-menu' : '' }}">
            <i class="bi bi-people"></i> Danh sách học viên
        </a>
    </div>

    <!-- CONTENT -->
    <div class="p-4 w-100">

        <!-- ALERT -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')

    </div>
</div>

</body>
</html>