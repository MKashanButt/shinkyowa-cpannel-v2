<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BodyType::create([
            'name' => 'Hatchback',
        ]);

        BodyType::create([
            'name' => 'Sedan',
        ]);

        BodyType::create([
            'name' => 'Truck',
        ]);

        BodyType::create([
            'name' => 'SUV',
        ]);

        BodyType::create([
            'name' => 'Van',
        ]);

        BodyType::create([
            'name' => 'Pickup',
        ]);

        BodyType::create([
            'name' => 'Wagon',
        ]);

        BodyType::create([
            'name' => 'Buses',
        ]);

        BodyType::create([
            'name' => 'Mini Buses',
        ]);
    }
}
