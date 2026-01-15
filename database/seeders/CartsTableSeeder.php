<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('carts')->insert([
            'user_id'    => 2,
            'quantity'   => 5,
            'product_id'=> 2,
            'created_at'=> '2026-01-12 18:10:00',
            'updated_at'=> '2026-01-12 22:27:49',
        ]);
    }
}
