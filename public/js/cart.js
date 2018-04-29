function removeFromCart(book, quantity, userId) {
    var body = {
        "book_id" : book,
        "book_quantity" : quantity,
    };

    // TODO Change id when users are created.
    var url = "/api/carts/"+userId+"/remove/";

    $.ajax({
        url: url,
        type:'PUT',
        data: body,
        // who needs error handling
        success:function(res){
            window.location.href = "/cart/";
        }
    });
};

removalQuantity = 1;

function setQuantity(value){
    removalQuantity = value;
};