<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \DB::table('users')->insert([
            'name' => 'AdminTest',
            'email' => 'Admin@test2.com',
            'role' => '1',
            'password' => \Hash::make('Magatron1'),
        ]);

        \DB::table('users')->insert([
            'name' => 'Depttest',
            'email' => 'Dept@test2.com',
            'role' => '2',
            'password' => \Hash::make('Magatron1'),
        ]);
    }
}
