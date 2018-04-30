@extends('shared.base')

@section('title', $title)

@section('mainDiv', 'individualBookPage')

@section('css')
    <link href="{{ asset('css/book.css') }}" rel="stylesheet" type="text/css">
@stop

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/books.js') }}"></script>
@stop

@section('content')
    <div class="container-fluid bookScroll" style="height:90%">
        <div class="row bottomBorder bookFlex">
            <div class="col-sm-10 col-xs-12">
                <h1>{{ $title }}</h1>
                <div style="font-size: 20px; padding-left: 15px;">By: {{$author}}
                    -- {{ $averageRating ? $averageRating." Stars" : "There are no ratings for this book yet" }}</div>
            </div>
            <div id="bookPageRightHeader" class="col-sm-2 col-xs-12">
                <div>
                    @include('shared.currencyDropdown')
                    <span class="price" style="font-size: 18px">{{ $price }}</span><br>
                </div>
                @if($isEnabled and $in_stock > 0)
                <button type="button" style="float:right; margin-top: 10px;" class="btn btn-primary" data-toggle="modal"
                        data-target="#addModal">Add To Cart
                </button>
                @else
                <button type="button" style="float:right; margin-top: 10px;" class="btn btn-primary" disabled>
                    Add To Cart
                </button>
                @endif
            </div>
        </div>
        <div class="row" style="height:85%">
            <div class="col-sm-4 col-xs-12" style="text-align:center">
                <img style="max-height:400px" src={{ $bookImgSrc }} />
            </div>
            <div class="col-sm-8 col-xs-12 bookReviews">
                <h3>
                    <b>{{$reviews ? "Here is what other's have said about ".$title : "Be the first to write a review!"}}</b>
                    @php
                        $hasBook = false;
                        if (Auth::user()->isRole('student')) {
                            $books = Auth::user()->roleInfo->first()->books;
                            if ($books) {
                                foreach($books as $book) {
                                    if($id == $book->id) {
                                        $hasBook = true;
                                        break;
                                    }
                                }
                            }

                        }
                    @endphp
                    @if($hasBook)
                        <div type="button" data-toggle="modal" data-target="#reviewModal" class="btn btn-primary"
                             style="max-width: 200px; text-overflow: ellipsis; overflow: hidden;">Review {{$title}}</div>
                    @endif
                </h3>
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
                        <h4 class="modal-title">Add <b>{{$title}}</b> to your cart.</h4>
                    </div>
                    <div class="modal-body">
                        <label for="quantitySelect">How many would you like to add?</label>
                        <input id="quantity" type="number" class="form-control" placeholder="80085" value="1"
                               aria-label="Quantity">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="addToCart({{$id}}, document.getElementById('quantity').value, {{ Auth::user()->id }})">
                            Add To Cart
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="reviewModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Reviewing <b>{{$title}}</b></h4>
                    </div>
                    <div class="modal-body">
                        <label for="ratingDropdownContainer">Rating:</label>
                        <div class="dropdown" id="ratingDropdownContainer">
                            <button id="currencyDropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <span id="currRating">1 Star</span><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" id="ratingList">
                                <li><a class="starItem" id="oneStar" onClick='window.changeRating(this)'>1 Star</a></li>
                                <li><a class="starItem" id="twoStar" onClick='window.changeRating(this)'>2 Stars</a></li>
                                <li><a class="starItem" id="threeStar" onClick='window.changeRating(this)'>3 Stars</a></li>
                                <li><a class="starItem" id="fourStar" onClick='window.changeRating(this)'>4 Stars</a></li>
                                <li><a class="starItem" id="fiveStar" onClick='window.changeRating(this)'>5 Stars</a></li>
                            </ul>
                        </div>
                        <br/>
                        <label for="quantitySelect">Review:</label>
                        <textarea id="review" style="max-width:100%" class="form-control"
                                  placeholder="How was the book?" aria-label="review"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                                onclick="postReview({{ Auth::user()->id }}, {{$id}}, document.getElementById('currRating').innerHTML, document.getElementById('review').value)">
                            Post Review
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection