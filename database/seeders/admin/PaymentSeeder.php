<?php

namespace Database\Seeders\admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'status' => 1,
                'payment_method' => 'Credit Card',
            ],
            [
                'status' => 1,
                'payment_method' => 'PayPal',
            ],
            [
                'status' => 1,
                'payment_method' => 'Bank Transfer',
            ],
        ]);
    }
}
