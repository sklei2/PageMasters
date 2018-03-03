@extends('shared.base')

@section('title', '{{ $title }}')

@section('mainDiv', 'individualBookPage')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class=" col-xs-offset-1 col-xs-4">
                <img src={{ $cover }} />
            </div>
            <div class="col-xs-7">
                <label>Title:</label>
                <span>{{ $title }}</span><br>
                <label>Author:</label>
                <span>{{ $author }}</span><br>
                <label>Book Rating:</label>
                <span>{{ $rating }}</span><br>
                <label>Price:</label>
                <span>{{ $price }}</span><br>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <h3>Here is what other's have said about {{$title}}</h3>
                <ul class="list-group">
                    @foreach ($reviews as $review)
                    <li class="media list-group-item">
                        <div class="media-body">
                            <h4>{{$review['user']}}</h4>
                            <p>{{$review['stars']}} stars</p>
                            <p><i>"{{$review['text']}}"</i></p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection