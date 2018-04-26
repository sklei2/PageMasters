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
	var keyValues = {};
	var form = event.target;
	for (var i = 0; i < form.elements.length; i++) {
		var input = form.elements[i];
		if (input.type != 'submit') {
			keyValues[input.name] = input.value;
		}
	}

	$.post('api/books', keyValues, function(data) {
		alert(data);
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