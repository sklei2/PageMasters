
<table id="courseList"class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">
            <span class="dropdown">
                <button id="currencyDropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.exchangeRates()">
                    Price (USD)<span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="currencyList">
                </ul>
            </span>
        </th>
        <th scope="col">Quantity</th>
    </tr>
    </thead>
    <form id="disableBookForm">
        <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td class="price">{{$book->price}}</td>
            <td><select class="quantity" autocomplete="off"></select></td>
        </tr>
        @endforeach
        </tbody>
    </form>
</table>
<button type="button" class="btn btn-primary" type="Submit" id="saveChanges" onclick="window.orderBooks()">Order</button>