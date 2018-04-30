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