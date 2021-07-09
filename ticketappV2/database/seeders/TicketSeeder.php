<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tickets')->insert([
            'title' => Str::random(10),
            'message' => Str::random(10),
            'status' => Str::random(10),
            'is_anonymous' => '1',
            'category' => Str::random(10),
            'user_background' => Str::random(10),
            'user_id'=>'4'
        ]);
        
    }

}
