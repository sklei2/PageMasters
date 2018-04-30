@extends('shared.base')

@section('title', 'Cart')

@php
    $totalCost = 0;
@endphp

@section('javascript')
<script type="text/javascript" src="{{ asset('js/cart.js') }}"></script>
@stop

@section('content')
<div id="bookPage">
    <div id="bookContainer" class="container-fluid" style="overflow-y: auto; padding-top:22px; width:100%">
        <table class="table">
            @if($response)
            <thead>
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">@include('shared.currencyDropdown')</th>
                <th scope="col">Quantity</th>
                <th scope="col">Remove From Cart</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($response as $book)
                    <tr>
                        <td><img style="max-height: 150px" src="{{$book->bookImgSrc}}"/></td>
                        <td>{{$book->title}}</td>
                        <td>{{$book->author}}</td>
                        <td class="price">${{$book->price}}</td>
                        <td>{{$book->book_quantity}}</td>
                        <td style="text-align: center">
                            <button type="button" class="btn btn-default" onclick="setQuantity(1)" data-toggle="modal" data-target="#deleteModal{{$book->id}}">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                    </tr>
                    <!-- is it efficient to create a modal for every book on the page,
                         rather than just passing in the necessary data to the same modal? -->
                    <!-- No, but it sure is easy. -->
                    <div class="modal fade" id="deleteModal{{$book->id}}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Remove {{$book->title}} from your cart.</h4>
                                </div>
                                <div class="modal-body">
                                    <label for="quantitySelect">How many would you like to remove from your cart?</label>
                                    <select class="form-control" id="quantitySelect" onchange="setQuantity(this.value)">
                                        @for ($i = 1; $i <= $book->book_quantity; $i++)
                                        <option>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn btn-default" onclick="removeFromCart({{$book->id}}, parseInt(removalQuantity), {{ Auth::user()->id }})">Remove From Cart</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $totalCost += $book->book_quantity * $book->price;
                    @endphp
                @endforeach
            @else
                <span>Your cart is empty!</span>
            @endif
            </tbody>
        </table>
        @if($response)
            <div>
                <div style="float:left">Total: ${{$totalCost}}</div>
                <button type="button" class="btn btn-default" style="float:right" data-toggle="modal" data-target="#purchaseModal">Purchase</button>
            </div>
        @endif
        <div class="modal fade" id="purchaseModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Purchase Books</h4>
                    </div>
                    <div class="modal-body">
                        <label for="ccNumber">Please enter your Credit Card Number</label>
                        <input type="text" id="ccNumber">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" onclick="purchaseCart(document.getElementById('ccNumber').value, {{ Auth::user()->id }}, {{json_encode($response)}}, {{$totalCost}})">Purchase Books</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


