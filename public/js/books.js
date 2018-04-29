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
        }
    });
};

addQuantity = 1;

function setQuantity(value){
    addQuantity = value;
};
