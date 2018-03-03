<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

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

    	Course::create([
    		'name' => 'Web Engineering 344',
    		'description' => 'Learn about the glory of Betty White'
    	]);

    	Course::create([
    		'name' => 'SWEN-262'
    		'description' => "The one class you won't stop bringing up in every interview. "
    	]);

    	Course::create([
    		'name' => 'Rockets and Stuff 201',
    		'description' => 'ROCKETS AND STUFF'
    	]);

    	Course::create([
    		'name' => 'Beers of the World',
    		'description' => 'AKA: Beer Snobbery 101 or An Excuse to Drink on Campus'
    	]);
    }
}
