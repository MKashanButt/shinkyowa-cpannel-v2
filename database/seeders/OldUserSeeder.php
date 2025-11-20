<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OldUserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            // Agent Accounts
            [
                'name' => 'Moiz',
                'email' => 'moiz@shinkyowa.com',
                'password' => bcrypt('moiz123'),
                'role_id' => 3,
            ],
            [
                'name' => 'Shaheen',
                'email' => 'shaheen@shinkyowa.com',
                'password' => bcrypt('shaheen123'),
                'role_id' => 3,
            ],
            [
                'name' => 'Jimmy',
                'email' => 'jimmy@shinkyowa.com',
                'password' => bcrypt('jimmy123'),
                'role_id' => 3,
            ],
            [
                'name' => 'Fatima',
                'email' => 'fatima@shinkyowa.com',
                'password' => bcrypt('fatima123'),
                'role_id' => 3,
            ],
            [
                'name' => 'Asad',
                'email' => 'asad@shinkyowa.com',
                'password' => bcrypt('asad123'),
                'role_id' => 3,
            ],
            // Customer Accounts
            [
                'name' => 'MR. SHAHBAZ MUSTAFA',
                'email' => 'galaxymotorsdrogheda@hotmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'Mr kieran sandford',
                'email' => 'sandfordmotors@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'careem reynold',
                'email' => 'careemreynolds@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'sean peterkin',
                'email' => 'seanpeterkin73@yahoo.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'Trevor Persaud',
                'email' => 'trevorpersaud2@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'omri simpson',
                'email' => 'omrihonda@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'Tjone Tonge',
                'email' => 'tijontonge99@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'rakeish manning',
                'email' => 'solidimpacmotorltd@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'damien coomb',
                'email' => '360motorsja@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'kamran',
                'email' => 'drift99motors@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'MATTHEW WRIGHT',
                'email' => 'BBC@GMAIL.COM',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'damion rhoden',
                'email' => 'acornsalesauto@gmail.com',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
            [
                'name' => 'MARK AUTO SPARE',
                'email' => 'BBEST@CAIRBSURF.COM',
                'password' => bcrypt('customer123'),
                'role_id' => 4,
            ],
        ]);
    }
}
