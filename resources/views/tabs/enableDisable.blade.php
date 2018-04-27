<table id="courseList" class="table">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Enabled</th>
    </tr>
    </thead>
    <form id="disableBookForm">
        <tbody>
        @foreach($books as $book)
        <tr id="book_{{$book->id}}">
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td><input id="bookEnabled_{{$book->id}}" type="checkbox" autocomplete="off" {{ $book->isEnabled ? "checked" : ""  }}></td>
        </tr>
        @endforeach
        </tbody>
    </form>
</table>
<button type="button" class="btn btn-primary" type="Submit" id="saveChanges" onclick="disableBooks()">Save changes</button>