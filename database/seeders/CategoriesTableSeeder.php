<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Bags',
                'imagepath' => 'assets/img/bags-1.jpg',
                'created_at' => '2026-01-10 21:27:26',
                'updated_at' => '2026-01-10 21:27:26',
            ],
            [
                'name' => 'Shoes',
                'imagepath' => 'assets/img/shoes-1.jpg',
                'created_at' => '2026-01-10 21:27:26',
                'updated_at' => '2026-01-10 21:27:26',
            ],
            [
                'name' => 'Clothes',
                'imagepath' => 'assets/img/clothes-1.jpg',
                'created_at' => '2026-01-10 21:27:26',
                'updated_at' => '2026-01-10 21:27:26',
            ],
            [
                'name' => 'Food',
                'imagepath' => 'assets/img/food-1.jpg',
                'created_at' => '2026-01-10 21:27:26',
                'updated_at' => '2026-01-10 21:27:26',
            ],
            [
                'name' => 'Electronics',
                'imagepath' => 'assets/img/electronics-1.jpg',
                'created_at' => '2026-01-10 21:27:26',
                'updated_at' => '2026-01-10 21:27:26',
            ],
            [
                'name' => 'Cameras',
                'imagepath' => 'assets/img/cameras-1.jpg',
                'created_at' => '2026-01-10 21:27:26',
                'updated_at' => '2026-01-10 21:27:26',
            ],
        ]);
    }
}
