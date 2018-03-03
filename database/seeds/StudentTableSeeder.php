<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Book;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->delete();

    	$student = Student::create([
    		'fName' => 'John',
    		'lName' => 'Doe'
    	]);

    	// Add couple book ids to the relational table
    	$student->books()->attach(
    		Book::where('isbn', '=','0425245284')->first()
    	);

    	$student->courses()->attach(
    		Course::where('name', '=', 'Web Engineering 344')->first()
    	);

    	$student = Student::create([
    		'fName' => 'Jane',
    		'lName' => 'Doe'
    	]);

    	$student->books()->attach(
    		Book::where('isbn', '=','0201633612')->first()
    	);

        $student->books()->attach(
            Book::where('isbn', '=', '0425245284')->first()
        );

    	$student = Student::create([
    		'fName' => 'Clark',
    		'lName' => 'Kent'
    	]);

    	$student->books()->attach(
    		Book::where('isbn', '=', '0553418025')->first()
    	);

    	$student->books()->attach(
    		Book::where('isbn', '=', '0547928211')->first()
    	);

    	$student->courses()->attach(
    		Course::where('name', '=', 'Rockets and Nerdom 201')->first()
    	); 

    	$student->courses()->attach(
    		Course::where('name', '=', 'Beers of the World')->first()
    	);

    	Student::create([
    		'fName' => 'Huge',
    		'lName' => 'Slacker'
    	]);
    }
}
