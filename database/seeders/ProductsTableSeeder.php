<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            ['name'=>'Bags Product 11','imagepath'=>'assets/img/bags-1.jpg','price'=>463.00,'quantity'=>15,'description'=>'Sample product for Bags','category_id'=>1,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-11 18:29:04'],
            ['name'=>'Bags Product 2','imagepath'=>'assets/img/bags-2.jpg','price'=>279.00,'quantity'=>25,'description'=>'Sample product for Bags','category_id'=>1,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Bags Product 3','imagepath'=>'assets/img/bags-3.jpg','price'=>344.00,'quantity'=>40,'description'=>'Sample product for Bags','category_id'=>1,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Bags Product 4','imagepath'=>'assets/img/bags-4.jpg','price'=>458.00,'quantity'=>40,'description'=>'Sample product for Bags','category_id'=>1,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Bags Product 5','imagepath'=>'assets/img/bags-5.jpg','price'=>66.00,'quantity'=>43,'description'=>'Sample product for Bags','category_id'=>1,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],

            ['name'=>'Shoes Product 1','imagepath'=>'assets/img/shoes-1.jpg','price'=>495.00,'quantity'=>19,'description'=>'Sample product for Shoes','category_id'=>2,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Shoes Product 2','imagepath'=>'assets/img/shoes-2.jpg','price'=>143.00,'quantity'=>38,'description'=>'Sample product for Shoes','category_id'=>2,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Shoes Product 3','imagepath'=>'assets/img/shoes-3.jpg','price'=>470.00,'quantity'=>36,'description'=>'Sample product for Shoes','category_id'=>2,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Shoes Product 4','imagepath'=>'assets/img/shoes-4.jpg','price'=>145.00,'quantity'=>41,'description'=>'Sample product for Shoes','category_id'=>2,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Shoes Product 5','imagepath'=>'assets/img/shoes-5.jpg','price'=>334.00,'quantity'=>37,'description'=>'Sample product for Shoes','category_id'=>2,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],

            ['name'=>'Clothes Product 1','imagepath'=>'assets/img/clothes-1.jpg','price'=>200.00,'quantity'=>12,'description'=>'Sample product for Clothes','category_id'=>3,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Clothes Product 2','imagepath'=>'assets/img/clothes-2.jpg','price'=>371.00,'quantity'=>18,'description'=>'Sample product for Clothes','category_id'=>3,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Clothes Product 3','imagepath'=>'assets/img/clothes-3.jpg','price'=>462.00,'quantity'=>18,'description'=>'Sample product for Clothes','category_id'=>3,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Clothes Product 4','imagepath'=>'assets/img/clothes-4.jpg','price'=>417.00,'quantity'=>43,'description'=>'Sample product for Clothes','category_id'=>3,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Clothes Product 5','imagepath'=>'assets/img/clothes-5.jpg','price'=>231.00,'quantity'=>49,'description'=>'Sample product for Clothes','category_id'=>3,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],

            ['name'=>'Food Product 1','imagepath'=>'assets/img/food-1.jpg','price'=>368.00,'quantity'=>24,'description'=>'Sample product for Food','category_id'=>4,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Food Product 2','imagepath'=>'assets/img/food-2.jpg','price'=>465.00,'quantity'=>27,'description'=>'Sample product for Food','category_id'=>4,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Food Product 3','imagepath'=>'assets/img/food-3.jpg','price'=>109.00,'quantity'=>43,'description'=>'Sample product for Food','category_id'=>4,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Food Product 4','imagepath'=>'assets/img/food-4.jpg','price'=>450.00,'quantity'=>14,'description'=>'Sample product for Food','category_id'=>4,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Food Product 5','imagepath'=>'assets/img/food-5.jpg','price'=>435.00,'quantity'=>23,'description'=>'Sample product for Food','category_id'=>4,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],

            ['name'=>'Electronics Product 1','imagepath'=>'assets/img/electronics-1.jpg','price'=>212.00,'quantity'=>43,'description'=>'Sample product for Electronics','category_id'=>5,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Electronics Product 2','imagepath'=>'assets/img/electronics-2.jpg','price'=>121.00,'quantity'=>5,'description'=>'Sample product for Electronics','category_id'=>5,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Electronics Product 3','imagepath'=>'assets/img/electronics-3.jpg','price'=>352.00,'quantity'=>10,'description'=>'Sample product for Electronics','category_id'=>5,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Electronics Product 4','imagepath'=>'assets/img/electronics-4.jpg','price'=>113.00,'quantity'=>29,'description'=>'Sample product for Electronics','category_id'=>5,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Electronics Product 5','imagepath'=>'assets/img/electronics-5.jpg','price'=>322.00,'quantity'=>12,'description'=>'Sample product for Electronics','category_id'=>5,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],

            ['name'=>'Cameras Product 1','imagepath'=>'assets/img/cameras-1.jpg','price'=>455.00,'quantity'=>35,'description'=>'Sample product for Cameras','category_id'=>6,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Cameras Product 2','imagepath'=>'assets/img/cameras-2.jpg','price'=>401.00,'quantity'=>49,'description'=>'Sample product for Cameras','category_id'=>6,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Cameras Product 3','imagepath'=>'assets/img/cameras-3.jpg','price'=>365.00,'quantity'=>36,'description'=>'Sample product for Cameras','category_id'=>6,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Cameras Product 4','imagepath'=>'assets/img/cameras-4.jpg','price'=>220.00,'quantity'=>26,'description'=>'Sample product for Cameras','category_id'=>6,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],
            ['name'=>'Cameras Product 5','imagepath'=>'assets/img/cameras-5.jpg','price'=>440.00,'quantity'=>31,'description'=>'Sample product for Cameras','category_id'=>6,'created_at'=>'2026-01-10 21:29:44','updated_at'=>'2026-01-10 21:29:44'],

            ['name'=>'test','imagepath'=>'assets/img/1768258880.jpg','price'=>123.00,'quantity'=>123,'description'=>'123123','category_id'=>3,'created_at'=>'2026-01-12 16:54:13','updated_at'=>'2026-01-12 23:01:20'],
        ]);
    }
}
