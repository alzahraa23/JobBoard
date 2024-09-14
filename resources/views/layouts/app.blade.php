 <!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Job Board')</title>
    <!-- تضمين ملفات CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('jobs.index') }}">Jobs</a></li> 
                <li><a href="{{ route('jobs.create') }}">Post a Job</a></li>
                <!-- إذا كان المستخدم مسجلاً الدخول -->
                @auth
                    <li><a href="{{ route('home') }}">{{ Auth::user()->name }}</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <!-- عرض الرسائل الفورية (Flash Messages) -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- عرض المحتوى المخصص -->
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Job Board. All Rights Reserved.</p>
    </footer>

    <!-- تضمين ملفات JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>