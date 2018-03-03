$('.myTabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});

$(document).ready(function(){
    $.ajax({ url: "/api/courses/2",
        success: function(res){
            console.log(res);
        }});
});