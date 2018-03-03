@php
    class managedCourse {
        function __construct($name, $code, $textbook) {
            $this->name = $name;
            $this->code = $code;
            $this->textbook = $textbook;
        }
    }
    $managedCourses = array(
        new managedCourse(
            'Engineering Secure Software',
            '1234',
            'Some textbook'
        ),
        new managedCourse(
            'Personal Software Engineering',
            '1234',
            'Some textbook'
        ),
        new managedCourse(
            'Beers of the World',
            '1234',
            'Some textbook'
        )
    );
@endphp
<div id="courses">
    <button id="addCourse" type="button" class="btn btn-secondary row">Add Course</button>
    @foreach ($managedCourses as $course)
        <div class="course container">
            <div class="row">
                <b class="courseLabel">Course name:</b>
                <p class="courseInfo">{{$course->name}}</p>
            </div>
            <div class="row">
                <b class="courseLabel">Course code:</b>
                <p class="courseInfo">{{$course->code}}</p>
            </div>
            <div class="row">
                <b class="courseLabel">Required reading:</b>
                <p class="courseInfo">{{$course->textbook}}</p>
            </div>
            <button class="btn btn-default"><span id="editCourse" class="glyphicon glyphicon-pencil"></span></button>
        </div>
    @endforeach
</div>