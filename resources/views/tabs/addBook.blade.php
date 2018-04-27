<form action="#" id="addBookForm" onsubmit="addBookFormSubmission(event)">
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
        <input id="imageUrlUpload" class="form-control" type="text" required name="bookImgSrc" placeholder="" onChange="window.coverImgChange(event)">
    </div>
    <div>
        <button class="btn btn-primary" type="submit" id="formSubmit">Add book</button>
    </div>
</form
<div id="preview">
    <img id="bookCoverPreview" src="" onError="coverImageOnError(event)" onLoad="coverImageOnLoad(event)"/>
</div>