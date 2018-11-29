<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Online Library</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <link href="{{ asset('public/css/dashboard.css') }}" rel="stylesheet" type="text/css" >
</head>

<body>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAARISURBVFhH5ZjNbxtFFMDD56mAhITgVCEEUkW5ARJwAITEAXGF/wAieuCARG0vEFlKvGt7165rYprszvojthMn6911AkmVpKhNJChFTUMTCIJaog2Y4LSxhUhsXCfx8GYzjhxjQUFarwU/6UnO25nJT+/NTOLt+t/hkrRnOElbYUU91yulj9J0Z9A3kH6RlbRK7JPzO4mpCzUWZYq9A9pr9LH1cJJ+BenztfH5bzCJsdlF7BuaKnAo83XfoPY2VPWFXpR5koR7IPMwndY+QGQtPnnBkGuM1PQCHlTntoLJ6XwgcToXiJ/OeSMfF9woc50LZ3pEUbyLLmEu3KD+LIf0kvLpV3+SbIxRqCxKz2L/0DjmkIa9slZ2yemn6DLm0of0Y/7Y1FYrMe3sEkbqLI6rozh/JYp3N5IYFxN4/YdhzIe1i3QJc3E6nbeTVo9MXzwgR6oajE/g4uo5vJ2bw5XLrCFXD4+slugS5sNK+gcDytkGuUUcSk3ganEFE2o3f8Pl8+/ty+0WElDB9Bqdbj49wfjwifjULpHTzi1jf2wcb/+aNeQIhuBnzL5gLpus8UgN0+nm4uAR+34glhVik2UiKCoz0NY5qrZH9af5Ay0eHFEq7CntCbqEeTgE2Q2Cl50h9Xk+MlEanbmEh5RRXP3xDK5VS0bliFz5ix5cy4cNueXFkW1fRE3RJczDLsheIsew4Qc8onLYLY+XJW0W57MxXFniYM8xuPw5Y1Su9sue3PWr0Nqw+rMzmLiXLmMOdgEJUD1M5GiK/FXZPAH3HDkA9VY2RmE1WROiWpFDY4/SKeYAcn5SOSJIUwYs0gUhorWU+3Y5VYV775r7lPoIHW4CGN8GcoF6W5sFnSHlkBBRb65fHTakdjb2TisaS2/xEU02t61EjpeDsO+W6m1tFiSwaOxl2GNZTlKhYmoeKho1/7TuyfU3yhFaCbYfQw591CxH6AhB2G8nW8kRLBe0e8TDcCh+JyLNAS2/4eDlAh1qDVC9HpBYpz/uwwjhx0F8w+YTn6MpCzCuFHmNVItmDKCq90H1vof8WzRlDXZBegmqVzkgCNJQ1UmHgNrzX8hfAS08U99vTfGl06ncTYdZg9FGQd6tS0FLN21eOQHSJYaX36TDrMPGo2OGHC8vOHyo2xkKHSJ5xicegTtxBYS51xXlDmOwFdg80lGQWIP95qGpfYgsSCZBfJ45iR6k6fZz3Bt5DESugWg/ORw0bWD3oTegupvwzNp7kFzUcGK/AxlUbyk53bA/q2SP2nh51RhoJe/y0Yeg1cuwJ4eZD6NH4PMWHJYdOCz93e16O/B3vONH95PrBapWgmrecAiRp+mjzuG4V76nmwlg+JJ+J011HkSQfuxMLBd0DWqvspJedIka/qfBSpmCS9RfoUuZA3xtLKRmFg68ALrVIO8DWaRt0KXMgVSi1S+/1SDz6VLm0Niyfxt0qf8yXV1/AFytG40Qks/+AAAAAElFTkSuQmCC">
    Online Library</a>

    <div class="container">
        <form action="/search" method="get" class="form-inline mt-2 mt-md-0">
            <input  name="query" class="form-control mr-sm-2 form-control-dark " type="text" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Найти</button>
        </form>
    </div>

    <!-- Authentication Links -->
    @guest
        <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Войти</a>

            @if (Route::has('register'))
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Зарегистрироваться</a>
            @endif
        </div>
    @else
        <div class="btn-group mr-2">
            <a class="btn btn-sm btn-outline-secondary" href="/home">
                Панель управления
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Выйти
            </a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Книги</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin_books">
                            <span data-feather="book-open"></span>
                            Все книги
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/update/books">
                            <span data-feather="refresh-cw"></span>
                            Обновить поиск
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Авторы</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin_authors">
                            <span data-feather="users"></span>
                            Все авторы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/update/authors">
                            <span data-feather="refresh-cw"></span>
                            Обновить поиск
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
            @section('content')

            @show
    </div>
</div>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

</body>
</html>
