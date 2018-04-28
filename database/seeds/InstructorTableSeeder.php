<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Instructor;
use App\User;

class InstructorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('instructors')->delete();

    	$instructor = Instructor::create([
    		'fname' => 'Dan',
            'lname' => 'Krutz'
    	]);

    	// Add coures ids to the relational table
    	$instructor->courses()->attach(
    		Course::where('name', '=', 'Web Engineering 344')->first()
    	);

        $instructor->courses()->attach(
            Course::where('name', '=', 'Beers of the World')->first()
        );

        // Save the user model to the instructor
        $instructor->user()->attach(
            User::where('name', '=', 'Dan Krutz')->first()
        );

    	$instructor = Instructor::create([
            'fname' => 'Sam',
            'lname' => 'Malachowsky'
        ]);     

    	$instructor->courses()->attach(
    	   Course::where('name', '=', 'SWEN-262')->first()
    	);

        $instructor->user()->attach(
            User::where('name', '=', 'Sam Malachowsky')->first()
        );

    	$instructor = Instructor::create([
    		'fname' => 'Elon',
            'lname' => 'Musk'
    	]);

    	$instructor->courses()->attach(
    		Course::where('name', '=', 'Rockets and Nerdom 201')->first()
    	);

        $instructor->user()->attach(
            User::where('name', '=', 'Elon Musk')->first()
        );        

        $instructor = Instructor::create([
            'fname' => 'Research',
            'lname' => 'Grant'
        ]);

        $instructor->user()->attach(
            User::where('name', '=', 'Research Grant')->first()
        );
    }
}
