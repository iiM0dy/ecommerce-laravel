<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
    [
        'name' => 'Mohamed Khaled',
        'email' => 'mohamed@example.com',
        'phone' => '+201234567890',
        'subject' => 'Excellent Product',
        'review' => 'I really loved this product. It works perfectly and the quality is top-notch!',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Sara Ali',
        'email' => 'sara.ali@example.com',
        'phone' => '+201098765432',
        'subject' => 'Good Service',
        'review' => 'The delivery was fast and the product matched the description. Very satisfied!',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'name' => 'Ahmed Hassan',
        'email' => 'ahmed.hassan@example.com',
        'phone' => '+201112223334',
        'subject' => 'Could be better',
        'review' => 'The product is okay but packaging could be improved. Overall decent.',
        'created_at' => now(),
        'updated_at' => now(),
    ],
]);

    }
}
