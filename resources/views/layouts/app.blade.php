<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="topbar">
    <a href="{{ route('students.create') }}" class="brand">
        <span class="brand-mark">SR</span>
        <span>Student Registration</span>
    </a>
    <nav>
        <a href="{{ route('students.create') }}" class="{{ request()->routeIs('students.create') ? 'active' : '' }}">Register</a>
        <a href="{{ route('students.index') }}" class="{{ request()->routeIs('students.index') ? 'active' : '' }}">Students</a>
    </nav>
</header>

<main class="page-shell">
    @if(session('success'))
        <div class="alert success" role="alert" id="flash-alert">
            <span class="alert-icon">&#10003;</span>
            <div style="flex:1">
                <strong>Registration complete</strong>
                <p>{{ session('success') }}</p>
            </div>
            <button onclick="this.closest('.alert').remove()" style="background:none;border:0;cursor:pointer;color:inherit;opacity:.6;font-size:18px;line-height:1;padding:0 2px">&times;</button>
        </div>
    @endif

    @yield('content')
</main>
<footer class="site-footer"><span>ITST 302 &ndash; Student Registration System</span><span>Laravel MVC &middot; Week 4</span></footer>
</body>
</html>
