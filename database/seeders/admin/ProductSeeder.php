<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert(
            // Merry Christmas
            [[
                'name' => 'Merry Christmas 1',
                'price' => 200000,
                'description' => 'Merry Christmas 1 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => '1734432676-pexels-brigitte-tohm-36757-263877.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Merry Christmas 2',
                'price' => 100000,
                'description' => 'Merry Christmas 2 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => '1734497318 - pexels-brigitte-tohm-36757-263877.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Merry Christmas 3',
                'price' => 150000,
                'description' => 'Merry Christmas 3 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'pexels-laura-james-6102415.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Merry Christmas 4',
                'price' => 100000,
                'description' => 'Merry Christmas 4 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'pexels-photo-5723988.jpeg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Happy New Year
            [
'name' => 'Happy New Year 1',
                'price' => 100000,
                'description' => 'Happy New Year 1 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'hpny.avif',
                'status' => 1,
                'featured' => 1,
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Happy New Year 2',
                'price' => 200000,
                'description' => 'Happy New Year 2 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'pexels-photo-5723988.jpeg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            [
                'name' => 'Happy New Year 3',
                'price' => 100000,
                'description' => 'Happy New Year 3 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'happy-new-year-greeting-card-2024_737705-59.avif',
                'status' => 1,
                'featured' => 1,
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Happy New Year 4',
                'price' => 100000,
                'description' => 'Happy New Year 4 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'set-new-year-banners-with-red-ribbon_23-2147725332.avif',
                'status' => 1,
                'featured' => 1,
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Happy Birth Day
            [
                'name' => 'Happy Birth Day 1',
                'price' => 200000,
                'description' => 'Happy Birth Day 1 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => '1734487018-hppd.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Happy Birth Day 2',
                'price' => 100000,
                'description' => 'Happy Birth Day 1 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => '1734489752-hppd-2.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Happy Birth Day 3',
                'price' => 100000,
                'description' => 'Happy Birth Day 3 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => '1734487248-hppd-3.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Happy Birth Day 4',
                'price' => 100000,
                'description' => 'Happy Birth Day 4 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'happy-birthday-vector-with-gift-box-background_647434-223.avif',
                'status' => 1,
                'featured' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Valentine Day
            [
                'name' => 'Valentine 1',
                'price' => 400000,
                'description' => 'Valentine 1 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'pexels-photo-11075154.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 4,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valentine 2',
                'price' => 300000,
                'description' => 'Valentine 2 description',
'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'pexels-laura-james-6102415.jpg',
                'status' => 1,
                'featured' => 1,
                'category_id' => 4,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valentine 3',
                'price' => 200000,
                'description' => 'Valentine 3 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'valentines-banner-cards-with-gifts_23-2147538707.avif',
                'status' => 1,
                'featured' => 1,
                'category_id' => 4,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Valentine 4',
                'price' => 100000,
                'description' => 'Valentine 4 description',
                'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit....',
                'image' => 'valentines-day-vector-sale-banner-template_1142-7248.avif',
                'status' => 1,
                'featured' => 1,
                'category_id' => 4,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]
    );
    }
}