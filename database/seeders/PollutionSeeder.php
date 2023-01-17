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
            ['kind' => 'visual', 'type' => 'GRAFFITTI', 'image_name' => 'img_graffitti.png'],
            ['kind' => 'visual', 'type' => 'FADED SIGNAGE', 'image_name' => 'img_faded_signage.png'],
            ['kind' => 'visual', 'type' => 'POTHOLES', 'image_name' => 'img_potholes.png'],
            ['kind' => 'visual', 'type' => 'GARBAGE', 'image_name' => 'img_garbage.png'],
            ['kind' => 'visual', 'type' => 'CONSTRUCTION ROAD', 'image_name' => 'img_construction_road.png'],
            ['kind' => 'visual', 'type' => 'BROKEN SIGNAGE', 'image_name' => 'img_broken_signage.png'],
            ['kind' => 'visual', 'type' => 'BAD STREETLIGHT', 'image_name' => 'img_bad_streetlight.png'],
            ['kind' => 'visual', 'type' => 'BAD BILLBOARD', 'image_name' => 'img_bad_billboard.png'],
            ['kind' => 'visual', 'type' => 'SAND ON ROCK', 'image_name' => 'img_sand_on_rock.png'],
            ['kind' => 'visual', 'type' => 'CLUTTER SIDEWALK', 'image_name' => 'img_clutter_sidewalk.png'],
            ['kind' => 'visual', 'type' => 'UNKEPT FACADE', 'image_name' => 'img_unkept_facade.png'],
        ]);
    }
}
