<?php

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Book;
use App\User;

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
    		'lName' => 'Doe',
            'account' => 100.0
    	]);

    	// Add couple book ids to the relational table
    	$student->books()->attach(
    		Book::where('isbn', '=','0425245284')->first()
    	);

        // Add course
    	$student->courses()->attach(
    		Course::where('name', '=', 'Web Engineering 344')->first()
    	);

        // Hook up the user to it
        $student->user()->attach(
            User::where('name', '=', 'John Doe')->first()
        );

    	$student = Student::create([
    		'fName' => 'Jane',
    		'lName' => 'Doe',
            'account' => 150.0
    	]);

    	$student->books()->attach(
    		Book::where('isbn', '=','0201633612')->first()
    	);        

        $student->books()->attach(
            Book::where('isbn', '=', '0425245284')->first()
        );

        // Hook up the user to it
        $student->user()->attach(
            User::where('name', '=', 'Jane Doe')->first()
        );

    	$student = Student::create([
    		'fName' => 'Clark',
    		'lName' => 'Kent',
            'account' => 100000.0
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

        // Hook up the user to it
        $student->user()->attach(
            User::where('name', '=', 'Clark Kent')->first()
        );

    	$student = Student::create([
    		'fName' => 'Huge',
    		'lName' => 'Slacker',
            'account' => -100.0
    	]);

        // Hook up the user to it
        $student->user()->attach(
            User::where('name', '=', 'Huge Slacker')->first()
        );
    }
}
