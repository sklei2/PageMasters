@php
    class enrolledCourse {
            function __construct($name, $code, $textbook) {
                $this->name = $name;
                $this->code = $code;
                $this->textbook = $textbook;
            }
    }
    $enrolledCourses = array(
        new enrolledCourse(
            'Engineering Secure Software',
            '1234',
            'Some textbook'
        ),
        new enrolledCourse(
            'Personal Software Engineering',
            '1234',
            'Some textbook'
        ),
        new enrolledCourse(
            'Beers of the World',
            '1234',
            'Some textbook'
        )
    );
@endphp
<div id="courses">
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