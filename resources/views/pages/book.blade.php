@extends('layouts.base')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <img src={{ URL::asset($img) }} />
    </div>
    <div>
        <label>Title:</label>
        <span>{{ $title }}</span><br>
        <label>Author:</label>
        <span>{{ $author }}</span><br>
        <label>Book Code:</label>
        <span>{{ $code }}</span><br>
        <label>Price:</label>
        <span>{{ $price }}</span><br>

    </div>
@endsection