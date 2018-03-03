<?php

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Student;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('reviews')->delete();

    	$student = Student::where('fname', '=', 'John')->first();

    	Review::create([
    		'student_id' => $student->id,
    		'book_id' => $student->books->first()->id,
    		'rating' => 3.50,
    		'textReview' => "I don't understand what this has to do with Web Engineering, but it was an interesting read.",
    	]);

    	$student = Student::where('fname', '=', 'Jane')->first();

    	Review::create([
    		'student_id' => $student->id,
    		'book_id' => $student->books->where('isbn', '=', '0201633612')->first()->id,
    		'rating' => 4.60,
    		'textReview' => "With this book I became an actual Software Engineer!",
    	]);

    	Review::create([
    		'student_id' => $student->id,
    		'book_id' => $student->books->where('isbn', '=', '0425245284')->first()->id,
    		'rating' => 5.00,
    		'textReview' => "I can't put the rating high enough for the High Lord Betty White!!!",
    	]);

    	$student = Student::where('fname', '=', 'Clark')->first();

    	Review::create([
    		'student_id' => $student->id,
    		'book_id' => $student->books->where('isbn', '=', '0553418025')->first()->id,
    		'rating' => 1.0,
    		'textReview' => "WHY DOESN'T HE JUST FLY HOME???"
    	])
    	
    }
}
