<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear out the table
        DB::table('roles')->delete();

        Role::Create([
        	'name' => 'student'
        ]);

        Role::Create([
        	'name' => 'instructor'
        ]);

        Role::Create([
        	'name' => 'admin'
        ]);
    }
}
