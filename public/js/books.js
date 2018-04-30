function addToCart(book, quantity, userId) {
    // get the currency type we're converting from, from the dropdown display
    var body = {
        "book_id" : book,
        "book_quantity" : quantity,
    };

    // TODO Change id when users are created.
    var url = "/api/carts/" + userId + "/add/";

    $.ajax({
        url: url,
        type:'PUT',
        data: body,
        // who needs error handling
        success:function(res){
            alert("This book has been added to your cart!");
        },
        error:function(res) {
            alert("You must order at least one book.");
        }
    });
};

addQuantity = 1;

function setQuantity(value){
    addQuantity = value;
};

function postReview(SID, bookID, rating, textReview) {
    var realRating = rating.split(" ")[0];
    var body = {
        'student_id': SID,
        'book_id': bookID,
        'rating': realRating,
        'textReview': textReview
    };

    var url = "/api/reviews/create";
    $.ajax({
        url: url,
        type:'POST',
        data: body,
        success: function(response) {
            alert("Review posted!");
            location.reload();
        },
        error: function(response) {
            alert("You have already reviewed this book!");
        }
    })
}