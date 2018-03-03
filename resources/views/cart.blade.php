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
        function __construct($cover, $title, $author, $quantity, $price) {
            $this->cover = $cover;
            $this->title = $title;
            $this->author = $author;
            $this->quantity = $quantity;
            $this->price = $price;
        }
    }
    $books = array(
      new book(
        'https://prodimage.images-bn.com/pimages/9780316338868_p0_v1_s600x595.jpg',
        'Food: What the Heck Should I Eat',
        'Mark Hyman, MD',
        3,
        18.89
      ),
      new book(
      'https://prodimage.images-bn.com/pimages/9780312577230_p0_v4_s600x595.jpg',
      'The Great Alone',
      'Kristin Hannah',
      1,
      17.39
      )
    );
    $totalCost = 0;
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
                <th scope="col">Price(USD)</th>
                <th scope="col">Quantity</th>
                <th scope="col">Remove From Cart</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td><img style="max-height: 150px" src="{{$book->cover}}"/></td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>${{$book->price}}</td>
                    <td>{{$book->quantity}}</td>
                    <td style="text-align: center">
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                @php
                $totalCost += $book->quantity * $book->price;
                @endphp
            @endforeach
            </tbody>
        </table>
        <div>
            <div style="float:left">Total: ${{$totalCost}}</div>
            <button type="button" class="btn btn-default" style="float:right">Purchase</button>
        </div>
    </div>
</div>
</body>
</html>
