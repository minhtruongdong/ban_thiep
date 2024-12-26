<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert(
            [
                [
                    'cart_total' => 10000,
                    'cart_date' => new \DateTime,
                    'status' => 1,
                    'user_id' => 1,
                    'payment_id' => 1,
                    'product_id' => 1,
                    'image_custom' => 'image',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
