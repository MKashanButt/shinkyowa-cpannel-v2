<?php

namespace Database\Seeders\OldData;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    public function run()
    {
        Stock::insert([
            [
                'sid' => 1,
                'thumbnail' => 'WVWZZZAUZEW243152_1_867_1727421636.jpg',
                'images' => '',
                'chassis' => '',
                'make_id' => '',
                'model' => '',
                'year' => '',
                'mileage' => '',
                'fob' => '',
                'currency_id' => '',
                'doors' => '',
                'transmission' => '',
                'body_type_id' => '',
                'fuel' => '',
                'category_id' => '',
                'country_id' => '',
                'features' => '',
                'customer_account_id' => '',
                'agent_id' => '',
            ],
        ]);
    }
}
