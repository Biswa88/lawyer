<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'client']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'lawyer']);
        // \App\Models\User::factory(10)->create();
    }
}
