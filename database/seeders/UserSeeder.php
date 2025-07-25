<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'سهراب',
                'email' => 'sohrab2@gmail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'مهراب',
                'email' => 'mehrab2@gmail.com',
                'password' => Hash::make('55555'),
            ]
        ]);
    }
}
