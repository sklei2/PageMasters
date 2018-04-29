function orderBooks(){
    var elements = document.getElementsByClassName("quantity");

    for(var i = 0; i<elements.length; i++) {
        var url = "api/books/"+elements[i].id;
        var newStock = parseInt(elements[i].getAttribute("data-stock")) +
            parseInt(elements[i].value);
        var body = {"in_stock" : parseInt(newStock)};
        $.ajax({
            url: url,
            type: 'PUT',
            data: body,
            // who needs error handling
            success: function (res) {
                console.log(res);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
}

function disableBooks() {
    var form = $('#disableBookForm');
    if (form && form[0]) {
        for (var i = 0; i < form[0].length; i++) {
            var input = form[0][i];
            if (input.type == 'checkbox') {
                var id = parseInt(input.id.substring(input.id.length -1));
                var isEnabled = input.checked ? 1 : 0;
                var data = { "isEnabled": isEnabled };
                $.ajax({
                    url: 'api/books/' + id,
                    type: 'PUT',
                    data: data,
                    success: function success(data) {
                        console.log(data);
                    },
                    error: function error(data) {
                        console.log(data);
                    }
                });
            }
        }
    }
};