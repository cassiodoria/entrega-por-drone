<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Drone;

class DroneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drone::create([
            'image' => "https://robohash.org/verovoluptatequia.jpg",
            'name' => "Suzann",
            'address' => "955 Springview Junction",
            'battery' => 90,
            'max_speed' => 3.8,
            'average_speed' => 11.6,
            'status' => "failed",
            'fly' => 94
        ]);
    }
}
