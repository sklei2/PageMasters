@extends('shared.base')

@section('title', '{{ $title }}')

@section('mainDiv', 'individualBookPage')

@section('javascript')
<script type="text/javascript" src="{{ asset('js/books.js') }}"></script>
@stop

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
                @include('shared.currencyDropdown')
                <span class="price">{{ $price }}</span><br>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add To Cart</button>
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