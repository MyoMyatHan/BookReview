@extends('layouts.app')

@section('content')
    <div class="container">



        <div class="mb-2 card">
            <div class="card-body">
                <h5 class="card-title"> {{ $book->name }} </h5>
                <div class="card-subtitle mb-2 text-muted small">
                    posted by : {{ $book->user->name }}
                    {{ $book->created_at->diffForHumans() }}
                </div>
                <!-- Display Average Rating -->
        <b> average rating :  {{ number_format($book->averageRating(), 2) }} / 5 stars</b>

                <p class="card-text"> {{ $book->description }} </p>

                <a href="{{url("/books/delete/$book->id")}}" class="btn btn-danger">
                    Delete
                </a>
            </div>
        </div>

        <!-- Display Book Ratings -->
        <ul class="list-group">
            <h2> Ratings</h2>

            @foreach ($book->reviews as $review)
                <li class="list-group-item">
                    <a href="{{ url("/reviews/delete/$review->id") }}" class="btn-close float-end">

                    </a>
                    Rating: {{ $review->rating }}/5 <br>
                    Comment: {{ $review->content }}
                    <div class="small mt-2">
                        reviewed by : <b> {{ $book->user->name }} </b> ,
                        {{ $book->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Form for Adding Ratings and Reviews -->
        @if ( auth()->check())
        <h2 class="mt-3">Add Rating & Review</h2>
        <form method="POST" action="{{ url('/reviews/add') }}">
            @csrf
            <input type="hidden" name="book_id" value="{{$book->id}}">
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea name="content" class="form-control mb-2"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-secondary">Submit</button>
            </div>
        </form>
        @else
        <p>Please <a href="{{ route('login')}}"> log in </a> to leave a review </p>
        @endif

    </div>
@endsection
