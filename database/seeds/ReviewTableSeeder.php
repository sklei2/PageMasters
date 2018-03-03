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
    		'book_id' => $student->books->first()->id,
    		'rating' => 4.60,
    		'textReview' => "With this book I became an actual Software Engineer!",
    	]);
    }
}
