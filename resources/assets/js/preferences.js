

window.formSubmit = function(){
    console.log('anything');
    $.ajax({
        url:'/api/courses',
        type:'post',
        data:$('#addCourseForm').serialize(),
        success:function(){
            window.location.href = "/preferences";
        }
    });
};

window.switchTabs = function switchTabs(id){
    $(".tab-pane").removeClass("active in");
    $("li").removeClass("active");
    $("li#" + id).addClass("active");
    $("div#" + id).addClass("active in");
};