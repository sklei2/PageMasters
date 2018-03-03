<?php

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Book;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('courses')->delete();

    	$course = Course::create([
    		'name' => 'Web Engineering 344',
    		'description' => 'Learn about the glory of Betty White'
    	]);

    	// Add couple book ids to the relational table
    	$course->books()->attach(
    		Book::where('isbn', '=','0425245284')->first()
    	);

    	$course = Course::create([
    		'name' => 'SWEN-262',
    		'description' => "The one class you won't stop bringing up in every interview. "
    	]);

    	$course->books()->attach(
    		Book::where('isbn', '=','0201633612')->first()
    	);

    	$course = Course::create([
    		'name' => 'Rockets and Nerdom 201',
    		'description' => 'ROCKETS AND NERDS!'
    	]);

    	$course->books()->attach(
    		Book::where('isbn', '=', '0553418025')->first()
    	);

    	$course->books()->attach(
    		Book::where('isbn', '=', '0547928211')->first()
    	);

    	Course::create([
    		'name' => 'Beers of the World',
    		'description' => 'AKA: Beer Snobbery 101 or An Excuse to Drink on Campus'
    	]);    	
    }
}
