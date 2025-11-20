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
        Country::insert([
            [
                'name' => 'Jamaica',
            ],
            [
                'name' => 'Bahamas',
            ],
            [
                'name' => 'Guyana',
            ],
            [
                'name' => 'Barbados',
            ],
            [
                'name' => 'Kenya',
            ],
            [
                'name' => 'Tanzania',
            ],
            [
                'name' => 'Ireland',
            ],
            [
                'name' => 'UK',
            ],
            [
                'name' => 'Pakistan',
            ],
            [
                'name' => 'Mauritius',
            ],
            [
                'name' => 'Antigua and Barbuda'
            ]
        ]);
    }
}
