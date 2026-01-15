<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPhotosTableSeeder extends Seeder
{
    public function run(): void
    {
        // Add sample product photos for some products
        DB::table('product_photos')->insert([
            // Bags Product 1 (id: 1)
            ['product_id' => 1, 'photo_path' => 'assets/img/bags-1.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 1, 'photo_path' => 'assets/img/bags-2.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Bags Product 2 (id: 2)
            ['product_id' => 2, 'photo_path' => 'assets/img/bags-3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 2, 'photo_path' => 'assets/img/bags-4.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Shoes Product 1 (id: 6)
            ['product_id' => 6, 'photo_path' => 'assets/img/shoes-2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 6, 'photo_path' => 'assets/img/shoes-3.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Clothes Product 1 (id: 11)
            ['product_id' => 11, 'photo_path' => 'assets/img/clothes-2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 11, 'photo_path' => 'assets/img/clothes-3.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 11, 'photo_path' => 'assets/img/clothes-4.jpg', 'created_at' => now(), 'updated_at' => now()],
            
            // Electronics Product 1 (id: 21)
            ['product_id' => 21, 'photo_path' => 'assets/img/electronics-2.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['product_id' => 21, 'photo_path' => 'assets/img/electronics-3.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
