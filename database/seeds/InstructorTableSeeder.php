<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Instructor;

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

    	$instructor = Instructor::create([
    		'fname' => 'Jane',
            'lname' => 'Doe'
    	]);

    	$instructor->courses()->attach(
    	   Course::where('name', '=', 'SWEN-262')->first()
    	);

    	$instructor = Instructor::create([
    		'fname' => 'Elon',
            'lname' => 'Musk'
    	]);

    	$instructor->courses()->attach(
    		Course::where('name', '=', 'Rockets and Nerdom 201')->first()
    	);

        Instructor::create([
            'fname' => 'Sam',
            'lname' => 'Malachowsky'
        ]);    	
    }
}
