function addToCart(book) {
    // get the currency type we're converting from, from the dropdown display
    var body = {
        "book_id" : book,
        "book_quantity" : 1,
    };

    // TODO Change id when users are created.
    var url = "/api/carts/2/add/";

    $.ajax({
        url: url,
        type:'PUT',
        data: body,
        // who needs error handling
        success:function(res){
            alert("This book has been added to your cart!");
        }
    });
};