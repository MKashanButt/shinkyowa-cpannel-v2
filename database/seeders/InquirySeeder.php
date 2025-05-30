<?php

namespace Database\Seeders;

use App\Models\Inquiry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inquiry::create([
            "name" => 'Jhon Doe',
            "email" => 'jhon@gmail.com',
            "phone" => "1234567890",
            "country_id" => 1,
            "message" => 'Testing',
            "ip" => request()->ip(),
        ]);
    }
}
