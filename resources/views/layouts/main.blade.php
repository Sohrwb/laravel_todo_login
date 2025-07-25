<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todo try 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- نوبار -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="تغییر منو">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">home</a>
                    </li>
                    @auth
                        @if (Auth()->user()->isAdmin)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('category.index') }}">categories</a>
                            </li>
                        @endif
                    @endauth

                    <li class="nav-item">
                        @guest()
                            <a class="btn btn-primary" href="{{ route('login.index') }}">login</a>
                            <a class="btn btn-success" href="{{ route('register.index') }}">sign in</a>
                        @endguest
                        @auth
                            <a class="btn btn-danger" href="{{ route('logout') }}">logout</a>

                            <a class="btn btn-primary" href="{{ route('profile') }}">MY profile</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- پیام موفقیت --}}
    @if (session('success'))
        <div class="alert alert-success m-3 alert-dismissible fade show " role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
        </div>
    @endif

    {{-- پیام خطا --}}
    @if (session('error'))
        <div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="بستن"></button>
        </div>
    @endif

    @yield('content')

    <!-- اسکریپت بوت‌استرپ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
