
<table id="courseList"class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Author</th>        
    </thead>
    <form id="disableBookForm">
        <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>            
            <td><select class="quantity" autocomplete="off"></select></td>
        </tr>
        @endforeach
        </tbody>
    </form>
</table>
<button type="button" class="btn btn-primary" type="Submit" id="saveChanges" onclick="orderBooks()">Order</button>