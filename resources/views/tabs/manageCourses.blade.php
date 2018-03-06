<div id="courses">
    <button id="addCourse" type="button" data-toggle="modal" data-target="#addCourseModal" class="btn btn-secondary row">Add Course</button>
    <script>
        window.onload = function(){
            var hash = window.location.hash;
            if(hash) {
                //shitty fix to make sure the page displays the top of the window
                var id = hash.replace('#', '');
                document.addEventListener("DOMContentLoaded", window.switchTabs(id))
            }
        }
    </script>
    <!-- Modal -->
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add a course</h4>
                </div>
                <form method="POST" action="#" id="addCourseForm">
                    <div class="modal-body">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            Name:
                            <input class="form-control" type="text" required name="name" placeholder="Name">
                            Description:
                            <input class="form-control" type="text" required name="description" placeholder="Description">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" type="Submit" id="formSubmit" onclick="window.formSubmit()">Add course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($courses as $course)
        <div class="course container">
            <div class="row">
                <b class="infoLabel">Course name:</b>
                <p class="infoContent">{{$course->name}}</p>
            </div>
            <div class="row">
                <b class="infoLabel">Course description:</b>
                <p class="infoContent">{{$course->description}}</p>
            </div>
            <button class="btn btn-default"><span id="editCourse" class="glyphicon glyphicon-pencil"></span></button>
        </div>
    @endforeach
</div>