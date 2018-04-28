<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\User;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        $admin = Admin::create(['name' => 'Boss Man']);
        $admin->user()->attach(
            User::where('name', '=', 'Boss Man') ->first()
        );
    }
}
