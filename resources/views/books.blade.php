@extends('shared.base')

@section('title', 'All Books')
@section('mainDiv', 'bookPage')

@section('javascript')
<script type="text/javascript" src="{{ asset('js/books.js') }}"></script>
@stop

@section('content')

    <div id="bookContainer" class="container-fluid" style="overflow-y: auto; padding-top:22px; width:100%">
        @php

        @endphp
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Rating</th>
                <th scope="col">
                    @include('shared.currencyDropdown')
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
                    <td>{{$book->averageRating or "N/A"}}</td>
                    <td class="price">{{$book->price}}</td>
                    <td>
                        <button type="button" class="btn btn-default" onclick="setQuantity(1)" data-toggle="modal" data-target="#addModal{{$book->id}}">
                            <span class="glyphicon glyphicon-plus-sign"></span>
                        </button>
                    </td>
                </tr>
                <div class="modal fade" id="addModal{{$book->id}}" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <label for="quantitySelect">How many would you like to add to your cart?</label>
                                <input id="quantity{{$book->id}}" type="number" class="form-control" placeholder="80085" aria-label="Quantity">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default"
                                        onclick="addToCart({{$book->id}}, document.getElementById('{{"quantity" . $book->id}}').value, {{ Auth::user()->id }})">
                                    Add To Cart
                                </button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
