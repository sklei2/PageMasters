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

function valid_credit_card(value) {
    // accept only digits, dashes or spaces
    if (/[^0-9-\s]+/.test(value)) return false;

    // The Luhn Algorithm. It's so pretty.
    var nCheck = 0, nDigit = 0, bEven = false;
    value = value.replace(/\D/g, "");

    for (var n = value.length - 1; n >= 0; n--) {
        var cDigit = value.charAt(n),
            nDigit = parseInt(cDigit, 10);

        if (bEven) {
            if ((nDigit *= 2) > 9) nDigit -= 9;
        }

        nCheck += nDigit;
        bEven = !bEven;
    }

    return (nCheck % 10) == 0;
}

function purchaseCart(ccNumber, SID, books, amount) {
    if(valid_credit_card(ccNumber)) {
        var bookNums = [];
        for(var i=0; i<books.length; i++) {
            bookNums[i] = books[i].id;
        }
        var url = '/api/students/'+SID+'/books/update';
        var body = {
            'books': bookNums,
            'amount': amount
        };
        $.ajax({
            url: url,
            type: 'PUT',
            data: body,
            success: function(response) {
                $('#purchaseModal').modal('hide');
                console.log(response);
            },
            error: function(response) {
                console.log(response);
            }
        });

        url = '/api/carts/'+SID+'/delete';
        $.ajax({
            url: url,
            type:'DELETE'
        });

    } else {
        alert("Please enter a valid credit card number");
    }
}