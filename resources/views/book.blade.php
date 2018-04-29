@extends('shared.base')

@section('title', '{{ $title }}')

@section('mainDiv', 'individualBookPage')

@section('css')
    <link href="{{ asset('css/book.css') }}" rel="stylesheet" type="text/css">
@stop

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/books.js') }}"></script>
@stop

@section('content')
    <div class="container-fluid" style="height:90%">
        <div class="row bottomBorder" style="display: flex">
            <div class="col-sm-10">
                <h1>{{ $title }}</h1>
                <div style="font-size: 20px; padding-left: 15px;">By: {{$author}} -- {{ $averageRating or "There are no ratings for this book yet" }}</div>
            </div>
            <div id="bookPageRightHeader" class="col-sm-2">
                <div>
                    @include('shared.currencyDropdown')
                    <span class="price" style="font-size: 18px">{{ $price }}</span><br>
                </div>
                <button type="button" style="float:right; margin-top: 10px;" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add To Cart</button>
            </div>
        </div>
        <div class="row" style="height:85%">
            <div class="col-sm-4">
                <img src={{ $bookImgSrc }} />
            </div>
            <div class="col-sm-8">
                <h3>Here is what other's have said about <b>{{$title}}</b></h3>
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
        <div class="modal fade" id="addModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <label for="quantitySelect">How many would you like to add to your cart?</label>
                        <input id="quantity" type="number" class="form-control" placeholder="80085" aria-label="Quantity">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                onclick="addToCart({{$id}}, document.getElementById('quantity').value, {{ Auth::user()->id }})">
                        Add To Cart
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection