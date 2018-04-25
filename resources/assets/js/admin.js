window.disableBook = function(){
//put request goes here
};

window.addBook = function(event){
	var hello = 'hello';
//post request goes here
};

window.coverImgChange = function(event) {

};

$(function(){
    var $select = $(".quantity");
    for (i=1;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});