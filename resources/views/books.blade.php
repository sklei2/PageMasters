@extends('shared.base')

@section('title', 'All Books')
@section('mainDiv', 'bookPage')
@section('content')

    <div id="bookContainer" class="container-fluid" style="overflow-y: auto; padding-top:22px; width:100%">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Rating</th>
                <th scope="col">
                    <span class="dropdown">
                        <button id="currencyDropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.exchangeRates()">
                            Price (USD)<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" id="currencyList">
                        </ul>
                    </span>
                </th>
                <th scope="col">Add to Cart</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($response as $book)
                <tr>
                    <td><a href="{{url('/book/' . $book->id)}}"><img style="max-height: 150px" src="{{$book->bookImgSrc}}"/></a></td>
                    <td><a href="{{url('/book/' . $book->id)}}">{{$book->title}}</a></td>
                    <td>{{$book->author}}</td>
                    <td>5 Stars</td>
                    <td class="price">{{$book->price}}</td>
                    <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
