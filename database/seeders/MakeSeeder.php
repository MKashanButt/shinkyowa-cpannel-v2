<?php

namespace Database\Seeders;

use App\Models\Make;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Make::create([
            'name' => 'Alfa Romeo',
        ]);

        Make::create([
            'name' => 'Toyota',
        ]);

        Make::create([
            'name' => 'Nissan',
        ]);

        Make::create([
            'name' => 'Mazda',
        ]);

        Make::create([
            'name' => 'Mitsubishi',
        ]);

        Make::create([
            'name' => 'Honda',
        ]);

        Make::create([
            'name' => 'Suzuki',
        ]);

        Make::create([
            'name' => 'Subaru',
        ]);

        Make::create([
            'name' => 'Isuzu',
        ]);

        Make::create([
            'name' => 'Daihatsu',
        ]);

        Make::create([
            'name' => 'Mitsuoka',
        ]);

        Make::create([
            'name' => 'Lexus',
        ]);

        Make::create([
            'name' => 'BMW',
        ]);

        Make::create([
            'name' => 'Mercedes',
        ]);

        Make::create([
            'name' => 'Audi',
        ]);

        Make::create([
            'name' => 'Hino',
        ]);

        Make::create([
            'name' => 'Volkswagen',
        ]);
    }
}
