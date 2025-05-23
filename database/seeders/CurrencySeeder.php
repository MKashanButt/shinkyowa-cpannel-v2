<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'symbol' => '$',
            'code' => 'USD',
        ]);

        Currency::create([
            'symbol' => '€',
            'code' => 'EUR',
        ]);

        Currency::create([
            'symbol' => '£',
            'code' => 'GBP',
        ]);

        Currency::create([
            'symbol' => '¥',
            'code' => 'JPY',
        ]);
    }
}
