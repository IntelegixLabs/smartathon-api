<?php

namespace Database\Seeders;

use App\Models\Pollution;
use Illuminate\Database\Seeder;

class PollutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pollution::insert([
            ['kind' => 'visual', 'type' => 'GRAFFITI'],
            ['kind' => 'visual', 'type' => 'FADED SIGNAGE'],
            ['kind' => 'visual', 'type' => 'POTHOLES'],
            ['kind' => 'visual', 'type' => 'GARBAGE'],
            ['kind' => 'visual', 'type' => 'CONSTRUCTION ROAD'],
            ['kind' => 'visual', 'type' => 'BROKEN SIGNAGE'],
            ['kind' => 'visual', 'type' => 'BAD STREETLIGHT'],
            ['kind' => 'visual', 'type' => 'BAD BILLBOARD'],
            ['kind' => 'visual', 'type' => 'SAND ON ROCK'],
            ['kind' => 'visual', 'type' => 'CLUTTER SIDEWALK'],
            ['kind' => 'visual', 'type' => 'UNKEPT FACADE'],
        ]);
    }
}
