window.onload = function() {
	var imageUpload = document.getElementById('imageUrlUpload');
	var imagePreview = document.getElementById('bookCoverPreview');
	if (imageUpload.value){
		imagePreview.src = imageUpload.value;
	}
};

function disableBook() {
	alert("DISABLE BOOK");
};

function addBookFormSubmission(event) {

	//data['_token'] = $('meta[name=csrf-token]').attr('content');
	$.ajax({
        url: '/api/books',
        type: 'post',
        data: $('#addBookForm').serialize() + "&isEnabled=0",
        success: function success(data) {            
            console.log(data);
        },
        error: function error(data) {
        	console.log(data);
        }
    });
};

function coverImgChange(event) {
	var imagePreview = document.getElementById('bookCoverPreview');
	if (event.target.value) {
		imagePreview.src = event.target.value;	
	} else {
		imagePreview.src = "#";
	}	
};

function coverImageOnLoad(event) {
	event.target.style.display = "block";
}

function coverImageOnError(event) {
	event.target.style.display = "none";
}

$(function(){
    var $select = $(".quantity");
    for (i=1;i<=100;i++){
        $select.append($('<option></option>').val(i).html(i))
    }
});