<form method="POST" action="#" id="addCourseForm">
    <div>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        Title:
        <input class="form-control" type="text" required name="title" placeholder="Title">
        Author:
        <input class="form-control" type="text" required name="author" placeholder="Author">
        ISBN:
        <input class="form-control" type="text" required name="isbn" placeholder="1234567890">
        Price:
        <input class="form-control" type="text" required name="price" placeholder="Price">
        Cover Image URL:
        <input class="form-control" type="text" required name="cover" placeholder="" onChange="window.coverImgChange(event)">
    </div>
    <div>
        <button type="button" class="btn btn-primary" type="Submit" id="formSubmit" onclick="window.addBook(event)">Add book</button>
    </div>
</form>