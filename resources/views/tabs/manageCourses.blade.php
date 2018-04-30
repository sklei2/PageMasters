
<div id="courses">
    <button id="addCourse" type="button" data-toggle="modal" data-target="#addCourseModal" class="btn btn-primary row">Add Course</button>
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
                        <button type="button" class="btn btn-primary" type="Submit" id="formSubmit" onclick="window.addCourse()">Add course</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="addBookToModal" tabindex="-1" role="dialog" aria-labelledby="myModal2Label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModal2Label">Add a course</h4>
                    </div>
                    <form method="POST" action="#" id="addBookToCourseForm">
                        <div class="modal-body">
                            <label>Books
                                <select name="book" id="book" class="form-control input-sm">
                                    @foreach ($books as $book)
                                    <option value="{{$book->id}}">
                                        {{ $book->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" type="Submit" id="formSubmit" onclick="window.addBookToCourse()">Add Book to Course</button>
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
        <button type="button" 
                class="btn btn-default" 
                data-toggle="modal"
                data-target="#addBookToModal"
                data-id="{{$course->id}}"
                data-name="{{$course->name}}">
                <span id="editCourse" class="glyphicon glyphicon-pencil"></span>
        </button>
            
        </div>
        </br>
    @endforeach
</div>
<script>
    $('#addBookToModal').modal({
        show:false,
    }).on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var name = button.data('name');
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-title').text('Add Book To ' + name);
        modal.data('cname', name);
    });
</script>