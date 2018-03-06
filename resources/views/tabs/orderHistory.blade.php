@php
    class book {
        function __construct($cover, $title, $author, $price, $dateOrdered) {
            $this->cover = $cover;
            $this->title = $title;
            $this->author = $author;
            $this->price = $price;
            $this->dateOrdered = $dateOrdered;
        }
    }
    $books = array(
        new book(
            'https://prodimage.images-bn.com/pimages/9781524763138_p0_v2_s600x595.jpg',
            'Becoming',
            'Michelle Obama',
            '$22.75',
            '01/11/12'
        ),
        new book(
            'https://prodimage.images-bn.com/pimages/9781982101534_p0_v1_s600x595.jpg',
            'The Forgotten Road',
            'Richard Paul Evans',
            '$14.65',
            '01/11/12'
        ),
        new book(
            'https://prodimage.images-bn.com/pimages/9781524714680_p0_v2_s600x595.jpg',
            'One of Us Is Lying',
            'Karen M. McManus',
            '$13.3',
            '01/11/12'
        )
    );
@endphp
<table class="table">
    <thead>
    <tr>
        <th scope="col">Cover</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col" onclick="window.exchangeRates()">Price(USD)</th>
        <th scope="col">Date Ordered</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($books as $book)
    <tr>
        <td><img style="max-height: 150px" src="{{$book->cover}}"/></td>
        <td>{{$book->title}}</td>
        <td>{{$book->author}}</td>
        <td>{{$book->price}}</td>
        <td>{{$book->dateOrdered}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
<p class="flex-center">End of order history</p>