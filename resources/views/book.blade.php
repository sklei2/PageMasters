@extends('shared.base')

@section('title', '{{ $title }}')

@section('mainDiv', 'individualBookPage')

@section('content')
    <div>
        <img src={{ $cover }} />
    </div>
    <div>
        <label>Title:</label>
        <span>{{ $title }}</span><br>
        <label>Author:</label>
        <span>{{ $author }}</span><br>
        <label>Book Rating:</label>
        <span>{{ $rating }}</span><br>
        <label>Price:</label>
        <span>{{ $price }}</span><br>
    </div>
@endsection