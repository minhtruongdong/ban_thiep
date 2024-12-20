<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
        [
            [
            'id' => 1,
            'email' => 'supperadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'level' => 1,
            'full_name' => 'Supper Admin',
            'phone' => '0987654321',
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
           ],
           [
            'id' => 2,
            'email' => 'member@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            'level' => 2,
            'full_name' => 'Supper Admin',
            'phone' => '0987654321',
            'status' => 1,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]
    );
    }
}
