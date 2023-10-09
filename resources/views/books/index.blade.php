@extends('layouts.app')

@section('content')
    <div class="container">
        {{ $books->links() }}
        @foreach ($books as $book)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title"> {{ $book->name }} </h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        posted by : {{ $book->user->name }}
                        {{ $book->created_at->diffForHumans() }}
                    </div>
                    <p class="card-text"> {{ $book->description }} </p>
                    <a href="{{url("/books/detail/$book->id")}}" class="card-link">
                        View detail &raquo;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
