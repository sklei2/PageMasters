@php
    class course {
        function __construct($name, $code, $textbook) {
            $this->name = $name;
            $this->code = $code;
            $this->textbook = $textbook;
        }
    }
    $courses = array(
        new course(
            'Engineering Secure Software',
            '1234',
            'Some textbook'
        ),
        new course(
            'Personal Software Engineering',
            '1234',
            'Some textbook'
        ),
        new course(
            'Beers of the World',
            '1234',
            'Some textbook'
        )
    );
@endphp
<div id="courses">

    <button id="addCourse" type="button" class="btn btn-secondary row">Add Course</button>
    @foreach ($courses as $course)
        <div class="course">
            <p>{{$course->name}}:</p>
            <p>{{$course->code}}:</p>
            <p>{{$course->textbook}}:</p>
            <button class="btn btn-default"><span id="editCourse" class="glyphicon glyphicon-pencil"></span></button>
        </div>
    @endforeach
</div>