@extends('layouts.app')

@section('content')
    <main role="main" class="inner cover"  style="margin-top:200px;">
        <h1 class="cover-heading">Чат на Laravel</h1>
        <p class="lead">Для проверки работы используйте режим защищенного просмотра для второго пользователя
            или приложение SessionBox для Chrome.</p>
        <p class="lead">
            <a class="btn btn-lg btn-secondary"
               href="/log/1?signature=2c4f71271eb16bc7d4495eb3736d4ee29f56af7502624c460172a2fffe3617cf">
                Вход для пользователя 1
            </a>
        </p>
        <p class="lead">
        <a class="btn btn-lg btn-secondary"
           href="/log/2?signature=ebc13df81ddb2ec548f48bea3dcf40c2606ef71ab5b6a1c252ca1792a8f1ab9f">
            Вход для пользователя 2
        </a>
        </p>
    </main>
@endsection
