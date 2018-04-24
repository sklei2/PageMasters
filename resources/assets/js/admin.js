window.disableBook = function(){
//put request goes here
};

window.addBook = function(){
//post request goes here
};

$(function(){
    var $select = $(".quantity");
    for (i=1;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});