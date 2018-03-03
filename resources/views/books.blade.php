<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
@php
    class book {
        function __construct($cover, $title, $author, $rating, $price) {
            $this->cover = $cover;
            $this->title = $title;
            $this->author = $author;
            $this->rating = $rating;
            $this->price = $price;
        }
    }
    $books = array(
      new book(
        'https://prodimage.images-bn.com/pimages/9781524763138_p0_v2_s600x595.jpg',
        'Becoming',
        'Michelle Obama',
        '5 Stars',
        '$22.75'
      ),
      new book(
      'https://prodimage.images-bn.com/pimages/9781982101534_p0_v1_s600x595.jpg',
      'The Forgotten Road',
      'Richard Paul Evans',
      '4 Stars',
      '$14.65'
      ),
      new book(
      'https://prodimage.images-bn.com/pimages/9781524714680_p0_v2_s600x595.jpg',
      'One of Us Is Lying',
      'Karen M. McManus',
      '1 Star',
      '$13.3'
      ),
      new book(
        'https://prodimage.images-bn.com/pimages/9780316513227_p0_v1_s600x595.jpg',
        'Fifty Fifty',
        'James Patterson',
        '5 Stars',
        '$16.79'
      ),
      new book(
        'https://prodimage.images-bn.com/pimages/9780399590504_p0_v3_s600x595.jpg',
        'Educated',
        'Tara Westover',
        '3 Stars',
        '$16.80'
      )
    );
@endphp
<div id="bookPage">
    @include('shared.navbar')
    <div id="bookContainer" class="container-fluid" style="overflow-y: auto; padding-top:22px; width:100%">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Rating</th>
                <th scope="col">Price(USD)</th>
                <th scope="col">Add to Cart</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td><img style="max-height: 150px" src="{{$book->cover}}"/></td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->rating}}</td>
                    <td>{{$book->price}}</td>
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
</div>
</body>
</html>

