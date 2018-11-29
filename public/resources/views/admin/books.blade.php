@extends('admin.app')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <br>
        <br>
        <h2>Все книги</h2>
        {{ $books->links() }}
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Author</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book['id'] }}</td>
                        <td>{{ $book['title'] }}</td>
                        <td>{{ $book->author->first }} {{ $book->author->last }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $books->links() }}

    </main>
@endsection