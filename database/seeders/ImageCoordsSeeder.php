<?php

namespace Database\Seeders;

use App\Models\ImageCoords;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ImageCoordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageCoords::insert([
            [
                'user_id' => 2,
                'latitude' => 12.44,
                'longitude' => 44.9,
                'unfixed_image' => 'broken_billboard.png',
                'w' => 0.542692,
                'x' => 0.439601,
                'y' => 0.774615,
                'z' => 0.513655,
                'pollution_id' => 7,
                'is_auto_uploaded' => 1,
                'is_fixed' => 0,
                'fixed_image' => null,
                'admin_id' => null
            ],
            [
                'user_id' => 3,
                'latitude' => 12.44,
                'longitude' => 44.9,
                'unfixed_image' => 'GRAFFITTI_5.png',
                'w' => 0.153956,
                'x' => 0.248000,
                'y' => 0.254222,
                'z' => 0.212800,
                'pollution_id' => 7,
                'is_auto_uploaded' => 1,
                'is_fixed' => 0,
                'fixed_image' => null,
                'admin_id' => null
            ],
            [
                'user_id' => 4,
                'latitude' => 12.44,
                'longitude' => 44.9,
                'unfixed_image' => 'GRAFFITTI_5.png',
                'w' => 0.459961,
                'x' => 0.572754,
                'y' => 0.918620,
                'z' => 0.458008,
                'pollution_id' => 7,
                'is_auto_uploaded' => 1,
                'is_fixed' => 0,
                'fixed_image' => null,
                'admin_id' => null
            ],
            [
                'user_id' => 2,
                'latitude' => 12.44,
                'longitude' => 44.9,
                'unfixed_image' => 'GRAFFITTI_5.png',
                'w' => 0.507639,
                'x' => 0.593056,
                'y' => 0.470833,
                'z' => 0.286111,
                'pollution_id' => 7,
                'is_auto_uploaded' => 1,
                'is_fixed' => 0,
                'fixed_image' => null,
                'admin_id' => null
            ]
        ]);
    }
}
