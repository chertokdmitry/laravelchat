<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Chat</title>

    <!-- Styles -->
    <link href="public//css/app.css" rel="stylesheet">
    <link href="{{ asset('public/css/cover.css') }}" rel="stylesheet" type="text/css" >
    <style>
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }
        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }
        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }
        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key'),
            'pusherCluster' => config('broadcasting.connections.pusher.options.cluster')
        ]) !!};
    </script>
</head>
<body class="text-center">
<div id="app" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header>
        <div class="inner">
            <h3 class="masthead-brand">
                <a href="/">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAQoSURBVFhH7ZdvaBNnHMefTrbhHCtM3IsNkkvbCRORMRGH25DBxpjIhvpKJ0yrFBxasG5VQbbBmLRabWty2RStoVZXO6U219aqVNkLdaMvphsyxSmtaLVbW5tL/2RV77fvpb+VJvckvSTX+cJ+4UNaevf9fu95nvy4iklNaoyoTkwxGsV8IyiKDE3sAtVgP/jGaBBrqF4ofOn/KxR4BaXKQQ9pgpKBa69QoyjAwzzDt0+czBVD6NcoFokvMh64px2r/S5bOS86I7IRclYWbhes5kN4fMmWzomC4jkY/ywLTYug2MLWzghPflgalCZ4WAOeH7F9ZsIBf08Wkiko2GGcEtM4Jn1Jt/aWl6hbS43Ln8Z6AHgXcUx6wizLizeN8ns+0bXNqXFxocUHBds4Kj1hG9bHmzqNcVy8xHGpC09YJjN1ko+9TQPusr8Cs+oo9UGOgodkpnS1mKijPDXaFlt9QL4aIFfJHVJUvcPj15dxtD1hiytlpk4WXLKngVylneTxh6OgqNf2aqJgsczUSd7c1UbunfdGC3LJGvw1i2skFmbg6zJTp7hxPDe6ve7df8cUHCkZ/pZrJBdW8arF3O6YOT0j9r44Kqo2jpy/PfetBf36gxx/eDbXSCzMwuUWc7uDulWJvW8M/Vo2bQi2U+GpQdr36zBtPx+xlPSoejPXSCwikYVv80+ykEzYX7+bVgX7o8UOXJIX5FUcf04azWIGtvq6LCgdag8tJ3fJbXLt7LKUsqDqa7hGcqFgviwsVeprlpKn5Ba5S++SxxeSlxqD4g9v5wrJhYJVskC7RLSp5DtWQauxrWu1MG07N0glFyKjFJ+VnEETVQ9whcQymsRMnMMhWfB4RLRpdLqxkIqa2mlt0yB93jpEzdeH6czNBzEELg9LC2IFVa4hF85fLsr9KQt/pGU93BcooCPVn9CF2gX0W90cajs6j04eXkTfH1xHK31H6NUdN6OjxLXjLikVvdISSVH1rVzFKoyY9/F63hdfDIUj4MeB5qnzXKV3HkULSOkkV1kXKZU9CNOt4TbI8elvcx2roiNGE+/gv7EN+NwM1qPYh0aLeJEvEe6K7gYPBq1ZQinvIfw+8rO3j1acGKB1LUMJ+aB2QFpqFFXvFF/RUxyVnjze0EzMq4gswDxX8WdtLJtwHmX3/QfOXyHHZCZzFMgC3qrup4U1iXmjqt9yzyhq+MrcvfQ0R2Qm8/UIbyCt0qB0UMO9ub6+PLZ3Rjl7e7PxBvKLNDBVVP0ztnVWeZXGs+YLJwIMabBdVL2cLSdGuWpoAUJapOH26H7ZG5rOdhMnt6q/5vGFN2IGnsS5+gPB97HC/4B7+GKdT/oQqn4ur7L7BbZ6fEKZFVzeUhIPcc3cDb708UrxheYr/tAXKPYdVu8H8xPztWCWr+t5vmRST4KE+BfLMsZEKCuatAAAAABJRU5ErkJggg==">
                    Laravel Chat</a>
            </h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="/">Главная</a>
                <!-- Authentication Links -->
                @guest
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Зарегистрироваться</a>
                        @endif
                @else
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Выйти
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
        </div>
    </header>



    @yield('content')
    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>Laravel Chat with Pusher Channels</p>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="public/js/app.js"></script>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>