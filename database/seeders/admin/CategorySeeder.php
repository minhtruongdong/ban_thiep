<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [[
            'name' => 'Merry Christmas',
            'status' => 1,
            'image' => 'images/category-images/1734486758-chis.jpg',
            'parent_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Happy New Year',
            'status' => 1,
            'image' => 'images/category-images/1734492464-hpny.avif',
            'parent_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Happy Birth Day',
            'status' => 1,
            'image' => 'images/category-images/1734486775-hpbd.jpg',
            'parent_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'name' => 'Valentine Day',
            'status' => 1,
            'image' => 'images/category-images/1734488868-valentine.jpg',
            'parent_id' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            ]]
        );
    }

}