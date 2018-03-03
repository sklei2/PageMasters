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
    @foreach ($enrolledCourses as $course)
    <div class="course">
        <p>{{$course->name}}:</p>
        <p>{{$course->code}}:</p>
        <p>{{$course->textbook}}:</p>
    </div>
    @endforeach
</div>