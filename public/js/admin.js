function disableBook() {
	alert("DISABLE BOOK");
};

function addBook(event) {
	alert("ADD BOOK");
};

function coverImgChange(event) {
	alert("COVER IMAGE CHANGE");
};

$(function(){
    var $select = $(".quantity");
    for (i=1;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});