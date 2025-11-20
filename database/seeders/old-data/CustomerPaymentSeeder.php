<?php

namespace Database\Seeders\OldData;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerPaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::insert([
            []
        ]);
    }
}
