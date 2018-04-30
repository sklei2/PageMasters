function addCourse() {
    $.ajax({
        url: '/api/courses',
        type: 'post',
        data: $('#addCourseForm').serialize(),
        success: function () {
            window.location.href = "/preferences#manageCourses";
        }
    });
};

function addToAccount(value, studentId) {
    var currentVal = parseFloat(document.getElementById("currentBalance").innerText.substring(1));
    var newValue = currentVal + value;

    $.ajax({
        url: '/api/students/update/' + studentId,
        data: {'account': newValue},
        type: 'PUT',
        success: function(data) {
            $('#addAccount').modal('hide');
            document.getElementById('currentBalance').innerText = '$' + newValue.toFixed(2);
        },
        error: function(data) {
            // yell at the student
            console.log(data);            
        }
    });
}   


function addBookToCourse() {

    $.ajax({
        url: '/addbooktocourse',
        method: "GET",
        data: {
            book_id: $('#addBookToCourseForm').serialize().substring(5),
            couse_name: "" + $('#addBookToModal').data('cname'),
        },
        success: function () {
            window.location.href = "/preferences";
        }
    });
};

function switchTabs(id) {
    $(".tab-pane").removeClass("active in");
    $("li").removeClass("active");
    $("li#" + id).addClass("active");
    $("div#" + id).addClass("active in");
};