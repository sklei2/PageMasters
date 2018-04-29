window.onload = function() {
	var imageUpload = document.getElementById('imageUrlUpload');
	var imagePreview = document.getElementById('bookCoverPreview');
	if (imageUpload.value){
		imagePreview.src = imageUpload.value;
	}
};

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

function addBookFormSubmission(event) {
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