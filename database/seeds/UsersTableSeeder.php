<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// clean the table out
        DB::table('users')->delete();

        // Create Users for students
        $student = User::create([
        	'name' => 'John Doe',
        	'email' => 'JohnDoe@example.com',
        	'password' => bcrypt('password')
        ]);
        $student->role()->attach(
            Role::where('name', '=', 'student')->first()
        );

		$student = User::create([
        	'name' => 'Jane Doe',
        	'email' => 'JaneDoe@example.com',
        	'password' => bcrypt('password')
        ]);

        $student->role()->attach(
            Role::where('name', '=', 'student')->first()
        );

        $student = User::create([
        	'name' => 'Clark Kent',
        	'email' => 'NotSuperman@example.com',
        	'password' => bcrypt('password')
        ]);

        $student->role()->attach(
            Role::where('name', '=', 'student')->first()
        );

        $student = User::create([
        	'name' => 'Huge Slacker',
        	'email' => 'HugeSlacker@example.com',
        	'password' => bcrypt('password')
        ]);

        $student->role()->attach(
            Role::where('name', '=', 'student')->first()
        );

        // Create Users for Instructors

        $instructor = User::create([
        	'name' => 'Dan Krutz',
        	'email' => 'DanKrutz@example.com',
        	'password' => bcrypt('password')
        ]);

        $instructor->role()->attach(
            Role::where('name', '=', 'instructor')->first()
        );

        $instructor = User::create([
        	'name' => 'Sam Malachowsky',
        	'email' => 'SamMalachowsky@example.com',
        	'password' => bcrypt('password')
        ]);

        $instructor->role()->attach(
            Role::where('name', '=', 'instructor')->first()
        );

        $instructor = User::create([
        	'name' => 'Elon Musk',
        	'email' => 'MarsBoy2022@example.com',
        	'password' => bcrypt('password')
        ]);

        $instructor->role()->attach(
            Role::where('name', '=', 'instructor')->first()
        );

        $instructor = User::create([
        	'name' => 'Research Grant',
        	'email' => 'ResearchGrant@example.com',
        	'password' => bcrypt('password')
        ]);

        $instructor->role()->attach(
            Role::where('name', '=', 'instructor')->first()
        );

        // Create User for Admin

        $admin = User::create([
        	'name' => 'Boss Man',
        	'email' => 'BO55MAN69@example.com',
        	'password' => bcrypt('password')
        ]);

        $admin->role()->attach(
            Role::where('name', '=', 'admin')->first()
        );
    }
}
