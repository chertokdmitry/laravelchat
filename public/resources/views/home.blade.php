@extends('admin.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <br>
                <br>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Панель управления</div>
                        <div class="card-body">

                                @isset($message)
                                    <br><br>
                                    <div class="alert alert-success" role="alert">
                                        {{ $message }}
                                    </div>
                                @endisset

                    </div>
                </div>
            </div>
        </div>
    </div>


            </main>
        </div>
    </div>

@endsection
