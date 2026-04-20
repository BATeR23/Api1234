<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        .error{
            color: red;
        }
    </style>
</head>

<body>

<header>
    <nav class="navbar navbar-light navbar-expand-lg">
        <a class="navbar-brand" href="/">Корочки.есть</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNav" class="collapse navbar-collapse">
            <div class="navbar-nav me-auto">

            @guest()
                <a class="nav-link" href="{{route('showRegister')}}">Регистрация</a>
                <a class="nav-link" href="{{route('showLogin')}}">Войти</a>
            @else
                @if(auth()->user()->role === 'admin')
                    <a class="nav-link" href="{{route('showAdmin')}}">Админ</a>
                @elseif(auth()->user()->role === 'user')
                    <a class="nav-link" href="{{route('showCabinet')}}">Мои заявки</a>
                @endif
            @endguest
            @auth
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <a class="nav-link" href="{{route('logout')}}"> Выйти </a>
                </form>
            @endauth
            </div>
        </div>
    </nav>
</header>

<main class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
            <button class="btn-close"></button>
        </div>
    @endif

    @yield('content')

</main>
</body>
<script src="{{ asset('js/bootstrap.js') }}"> </script>
<script src="{{asset('js/slider.js')}}"> </script>
</html>
