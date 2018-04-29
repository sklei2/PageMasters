@extends('shared.base')

@section('title', '{{ $title }}')

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
            @foreach ($response as $book)
                <tr>
                    <td><img style="max-height: 150px" src="{{$book->bookImgSrc}}"/></td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>${{$book->price}}</td>
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
                                <h4 class="modal-title">Modal Header</h4>
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
                                <button type="button" class="btn btn-default" onclick="removeFromCart({{$book->id}}, parseInt(removalQuantity), {{ Auth::user()->id }})">Remove From Cart</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $totalCost += $book->book_quantity * $book->price;
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
@endsection


