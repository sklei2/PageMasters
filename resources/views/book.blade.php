@extends('shared.base')

@section('title', '{{ $title }}')

@section('mainDiv', 'individualBookPage')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-xs-offset-1 col-xs-4">
                <img src={{ $bookImgSrc }} />
            </div>
            <div class="col-xs-7">
                <label>Title:</label>
                <span>{{ $title }}</span><br>
                <label>Author:</label>
                <span>{{ $author }}</span><br>
                <label>ISBN:</label>
                <span>{{ $isbn }}</span><br>
                <label>Book Rating:</label>
                <span>{{ $averageRating or "There are no ratings for this book yet" }}</span><br>
                <label>Price:</label>
                <span>{{ $price }}</span><br>
                <button type="button" class="btn btn-primary">Add To Cart</button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <h3>Here is what other's have said about {{$title}}</h3>
                <ul class="list-group">
                    @foreach ($reviews as $review)
                    <li class="media list-group-item">
                        <div class="media-body">
                            {{--  <h4>{{$review['user']}}</h4>  --}}
                            <h4>{{$review['rating']}} stars</h4>
                            <p><i>"{{$review['textReview']}}"</i></p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection