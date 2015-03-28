<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        Role::create(['name' => 'Root', 'description' => 'Provides access to all areas of the application.']);
        Role::create(['name' => 'Administrator', 'description' => 'Provides access to all administrative features of the application.']);
        Role::create(['name' => 'Engineer', 'description' => 'Provides access to all features of the application in relation to engineers.']);
        Role::create(['name' => 'Consumer', 'description' => 'Provides access to all features of the application in relation to consumers.']);
    }
}
