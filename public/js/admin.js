window.disableBook = function(){
	alert("DISABLE BOOK");
};

window.addBook = function(event){
	alert("ADD BOOK");
};

window.coverImgChange = function(event) {
	alert("COVER IMAGE CHANGE");
};

$(function(){
    var $select = $(".quantity");
    for (i=1;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});