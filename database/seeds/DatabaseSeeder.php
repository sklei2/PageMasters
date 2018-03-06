<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('AdminTableSeeder');
        // Make sure the Book Seeder is done before almost all
        // other seeds, since it is relied upon
        $this->call('BookTableSeeder');
        // Make sure this is done before students since students
        // will make a pivot table for it to work
        $this->call('CartTableSeeder');
        // Make sure we do Course Seeding before Students and
        // Instructors since they both have courses
        $this->call('CourseTableSeeder');
        
        $this->call('InstructorTableSeeder');
        $this->call('StudentTableSeeder');
    }
}
