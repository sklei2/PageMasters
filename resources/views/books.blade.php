@extends('shared.base')

@section('title', 'All Books')
@section('mainDiv', 'bookPage')
@section('content')
@php

    class book {
        function __construct($id, $cover, $title, $author, $rating, $price) {
            $this->id = $id;
            $this->cover = $cover;
            $this->title = $title;
            $this->author = $author;
            $this->rating = $rating;
            $this->price = $price;
        }
    }

    $books = array(
      new book(
        0,
        'https://prodimage.images-bn.com/pimages/9781524763138_p0_v2_s600x595.jpg',
        'Becoming',
        'Michelle Obama',
        '5 Stars',
        '$22.75'
      ),
      new book(
      1,
      'https://prodimage.images-bn.com/pimages/9781982101534_p0_v1_s600x595.jpg',
      'The Forgotten Road',
      'Richard Paul Evans',
      '4 Stars',
      '$14.65'
      ),
      new book(
      2,
      'https://prodimage.images-bn.com/pimages/9781524714680_p0_v2_s600x595.jpg',
      'One of Us Is Lying',
      'Karen M. McManus',
      '1 Star',
      '$13.3'
      ),
      new book(
        3,
        'https://prodimage.images-bn.com/pimages/9780316513227_p0_v1_s600x595.jpg',
        'Fifty Fifty',
        'James Patterson',
        '5 Stars',
        '$16.79'
      ),
      new book(
        4,
        'https://prodimage.images-bn.com/pimages/9780399590504_p0_v3_s600x595.jpg',
        'Educated',
        'Tara Westover',
        '3 Stars',
        '$16.80'
      )
    );
@endphp
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
