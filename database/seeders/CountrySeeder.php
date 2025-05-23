<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'name' => 'Jamaica',
        ]);

        Country::create([
            'name' => 'Bahamas',
        ]);

        Country::create([
            'name' => 'Guyana',
        ]);

        Country::create([
            'name' => 'Barbados',
        ]);

        Country::create([
            'name' => 'Kenya',
        ]);

        Country::create([
            'name' => 'Tanzania',
        ]);

        Country::create([
            'name' => 'Ireland',
        ]);

        Country::create([
            'name' => 'UK',
        ]);

        Country::create([
            'name' => 'Pakistan',
        ]);

        Country::create([
            'name' => 'Mauritius',
        ]);
    }
}
