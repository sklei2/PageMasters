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
        // Make sure to seed Books before Courses and Courses before
        // Students so that we can populate some test links between
        // Sudents to Courses and books and Courses to books
        $this->call('BookTableSeeder');
        $this->call('CourseTableSeeder');
    }
}
