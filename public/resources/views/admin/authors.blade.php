@extends('admin.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <br><br>
        <h2>{{ $header }}</h2>
        {{ $items->links() }}
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['first'] }}</td>
                        <td>{{ $item['last'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $items->links() }}
    </main>
@endsection