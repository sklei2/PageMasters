@extends('shared.base')

@section('title', 'All Books')
@section('mainDiv', 'bookPage')

@section('javascript')
<script type="text/javascript" src="{{ asset('js/books.js') }}"></script>
@stop

@section('content')

    <div id="bookContainer" class="container-fluid alignXS" style="overflow-y: auto; padding-top:22px; width:100%">
            <div class="row d-sm-none bottomBorder">
                <div class="col-xs-3 col-sm-2">Cover</div>
                <div class="col-xs-3 col-sm-2">Title</div>
                <div class="col-xs-3 col-sm-2">Author</div>
                <div class="col-sm-2 d-sm-none">Rating</div>
                <div class="col-sm-2 d-sm-none">
                    @include('shared.currencyDropdown')
                </div>
                <div class="col-xs-3 col-sm-2">Add to Cart</div>
            </div>

                @foreach ($response as $book)
                <div class="row bottomBorder">
                    <div class="col-sm-2 col-xs-12">
                        <a href="{{url('/book/' . $book->id)}}">
                            @if ($book->isEnabled and $book->in_stock > 0)
                            <img class="bookHeight" src="{{$book->bookImgSrc}}"/>
                            @else
                            <img class="bookHeight" src="{{$book->bookImgSrc}}" style="opacity: 0.5"/>
                            @endif
                        </a>
                    </div>
                    <div class="col-sm-2 col-xs-12"><a href="{{url('/book/' . $book->id)}}">{{$book->title}}</a></div>
                    <div class="col-sm-2 col-xs-12">{{$book->author}}</div>
                    <div class="col-sm-2 d-sm-none">{{$book->averageRating or "N/A"}}</div>
                    <div class="col-sm-2 col-xs-12 price">{{$book->price}}</div>
                    <div class="col-sm-2 d-sm-none">
                        @if ($book->isEnabled and $book->in_stock > 0)
                        <button type="button" class="btn btn-default" onclick="setQuantity(1)" data-toggle="modal" data-target="#addModal{{$book->id}}">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </button>
                        @else
                        <button type="button" disabled class="btn btn-default" onclick="setQuantity(1)" data-toggle="modal" data-target="#addModal{{$book->id}}">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </button>
                        @endif
                    </div>
                </div>
                <div class="modal fade" id="addModal{{$book->id}}" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add <b>{{$book->title}}</b> to your cart.</h4>
                            </div>
                            <div class="modal-body">
                                <label for="quantitySelect">How many would you like to add?</label>
                                <input id="quantity{{$book->id}}" type="number" class="form-control" placeholder="80085" value="1" aria-label="Quantity">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                        onclick="addToCart({{$book->id}}, document.getElementById('{{"quantity" . $book->id}}').value, {{ Auth::user()->id }})">
                                    Add To Cart
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection
