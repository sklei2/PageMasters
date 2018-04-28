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

function switchTabs(id) {
    $(".tab-pane").removeClass("active in");
    $("li").removeClass("active");
    $("li#" + id).addClass("active");
    $("div#" + id).addClass("active in");
};