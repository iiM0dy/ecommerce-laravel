<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([

            // ===== Bags =====
            ['name' => 'حقيبة جلد فاخرة', 'name_en' => 'Luxury Leather Bag', 'imagepath' => 'assets/img/bags-1.jpg', 'price' => 463, 'quantity' => 15, 'description' => 'حقيبة جلدية أنيقة للاستخدام اليومي', 'description_en' => 'Elegant leather bag for daily use', 'category_id' => 1,],
            ['name' => 'حقيبة يد عصرية', 'name_en' => 'Modern Handbag', 'imagepath' => 'assets/img/bags-2.jpg', 'price' => 279, 'quantity' => 25, 'description' => 'حقيبة خفيفة بتصميم عصري', 'description_en' => 'Lightweight modern handbag', 'category_id' => 1,],
            ['name' => 'حقيبة سفر متينة', 'name_en' => 'Durable Travel Bag', 'imagepath' => 'assets/img/bags-3.jpg', 'price' => 344, 'quantity' => 40, 'description' => 'حقيبة واسعة مناسبة للسفر', 'description_en' => 'Spacious bag suitable for travel', 'category_id' => 1,],
            ['name' => 'حقيبة كتف أنيقة', 'name_en' => 'Stylish Shoulder Bag', 'imagepath' => 'assets/img/bags-4.jpg', 'price' => 458, 'quantity' => 40, 'description' => 'حقيبة كتف بتصميم أنيق', 'description_en' => 'Elegant shoulder bag', 'category_id' => 1,],
            ['name' => 'حقيبة صغيرة عملية', 'name_en' => 'Compact Practical Bag', 'imagepath' => 'assets/img/bags-5.jpg', 'price' => 66, 'quantity' => 43, 'description' => 'حقيبة صغيرة للاستخدام السريع', 'description_en' => 'Compact bag for quick use', 'category_id' => 1,],

            // ===== Shoes =====
            ['name' => 'حذاء رياضي مريح', 'name_en' => 'Comfortable Sports Shoes', 'imagepath' => 'assets/img/shoes-1.jpg', 'price' => 495, 'quantity' => 19, 'description' => 'حذاء مناسب للمشي والرياضة', 'description_en' => 'Shoes suitable for walking and sports', 'category_id' => 2,],
            ['name' => 'حذاء رسمي أنيق', 'name_en' => 'Elegant Formal Shoes', 'imagepath' => 'assets/img/shoes-2.jpg', 'price' => 143, 'quantity' => 38, 'description' => 'حذاء رسمي للمناسبات', 'description_en' => 'Formal shoes for occasions', 'category_id' => 2,],
            ['name' => 'حذاء كاجوال عملي', 'name_en' => 'Casual Practical Shoes', 'imagepath' => 'assets/img/shoes-3.jpg', 'price' => 470, 'quantity' => 36, 'description' => 'حذاء عملي للاستخدام اليومي', 'description_en' => 'Practical daily-use shoes', 'category_id' => 2,],
            ['name' => 'حذاء جلد طبيعي', 'name_en' => 'Genuine Leather Shoes', 'imagepath' => 'assets/img/shoes-4.jpg', 'price' => 145, 'quantity' => 41, 'description' => 'حذاء مصنوع من الجلد الطبيعي', 'description_en' => 'Shoes made of genuine leather', 'category_id' => 2,],
            ['name' => 'حذاء شبابي عصري', 'name_en' => 'Modern Youth Shoes', 'imagepath' => 'assets/img/shoes-5.jpg', 'price' => 334, 'quantity' => 37, 'description' => 'حذاء شبابي بتصميم عصري', 'description_en' => 'Modern youth-style shoes', 'category_id' => 2,],

            // ===== Clothes =====
            ['name' => 'قميص قطن مريح', 'name_en' => 'Comfortable Cotton Shirt', 'imagepath' => 'assets/img/clothes-1.jpg', 'price' => 200, 'quantity' => 12, 'description' => 'قميص قطن عالي الجودة', 'description_en' => 'High-quality cotton shirt', 'category_id' => 3,],
            ['name' => 'بنطال كاجوال', 'name_en' => 'Casual Pants', 'imagepath' => 'assets/img/clothes-2.jpg', 'price' => 371, 'quantity' => 18, 'description' => 'بنطال مريح للاستخدام اليومي', 'description_en' => 'Comfortable pants for daily use', 'category_id' => 3,],
            ['name' => 'جاكيت شتوي', 'name_en' => 'Winter Jacket', 'imagepath' => 'assets/img/clothes-3.jpg', 'price' => 462, 'quantity' => 18, 'description' => 'جاكيت دافئ لفصل الشتاء', 'description_en' => 'Warm jacket for winter', 'category_id' => 3,],
            ['name' => 'تيشيرت شبابي', 'name_en' => 'Youth T-Shirt', 'imagepath' => 'assets/img/clothes-4.jpg', 'price' => 417, 'quantity' => 43, 'description' => 'تيشيرت بتصميم عصري', 'description_en' => 'Modern design t-shirt', 'category_id' => 3,],
            ['name' => 'هودي رياضي', 'name_en' => 'Sport Hoodie', 'imagepath' => 'assets/img/clothes-5.jpg', 'price' => 231, 'quantity' => 49, 'description' => 'هودي مناسب للرياضة', 'description_en' => 'Hoodie suitable for sports', 'category_id' => 3,],

            // ===== Food =====
            ['name' => 'وجبة صحية', 'name_en' => 'Healthy Meal', 'imagepath' => 'assets/img/food-1.jpg', 'price' => 368, 'quantity' => 24, 'description' => 'وجبة متوازنة وصحية', 'description_en' => 'Balanced healthy meal', 'category_id' => 4,],
            ['name' => 'وجبة سريعة', 'name_en' => 'Fast Meal', 'imagepath' => 'assets/img/food-2.jpg', 'price' => 465, 'quantity' => 27, 'description' => 'وجبة سريعة التحضير', 'description_en' => 'Quick prepared meal', 'category_id' => 4,],
            ['name' => 'وجبة نباتية', 'name_en' => 'Vegetarian Meal', 'imagepath' => 'assets/img/food-3.jpg', 'price' => 109, 'quantity' => 43, 'description' => 'وجبة مناسبة للنباتيين', 'description_en' => 'Meal suitable for vegetarians', 'category_id' => 4,],
            ['name' => 'وجبة عائلية', 'name_en' => 'Family Meal', 'imagepath' => 'assets/img/food-4.jpg', 'price' => 450, 'quantity' => 14, 'description' => 'وجبة تكفي العائلة', 'description_en' => 'Meal suitable for family', 'category_id' => 4,],
            ['name' => 'وجبة دايت', 'name_en' => 'Diet Meal', 'imagepath' => 'assets/img/food-5.jpg', 'price' => 435, 'quantity' => 23, 'description' => 'وجبة قليلة السعرات', 'description_en' => 'Low-calorie meal', 'category_id' => 4,],

            // ===== Electronics =====
            ['name' => 'سماعة لاسلكية', 'name_en' => 'Wireless Headphones', 'imagepath' => 'assets/img/electronics-1.jpg', 'price' => 212, 'quantity' => 43, 'description' => 'سماعة بصوت عالي الجودة', 'description_en' => 'High-quality sound headphones', 'category_id' => 5,],
            ['name' => 'ماوس ألعاب', 'name_en' => 'Gaming Mouse', 'imagepath' => 'assets/img/electronics-2.jpg', 'price' => 121, 'quantity' => 5, 'description' => 'ماوس مخصص للألعاب', 'description_en' => 'Mouse designed for gaming', 'category_id' => 5,],
            ['name' => 'لوحة مفاتيح', 'name_en' => 'Keyboard', 'imagepath' => 'assets/img/electronics-3.jpg', 'price' => 352, 'quantity' => 10, 'description' => 'لوحة مفاتيح احترافية', 'description_en' => 'Professional keyboard', 'category_id' => 5,],
            ['name' => 'شاحن سريع', 'name_en' => 'Fast Charger', 'imagepath' => 'assets/img/electronics-4.jpg', 'price' => 113, 'quantity' => 29, 'description' => 'شاحن يدعم الشحن السريع', 'description_en' => 'Fast charging supported charger', 'category_id' => 5,],
            ['name' => 'سماعة بلوتوث', 'name_en' => 'Bluetooth Speaker', 'imagepath' => 'assets/img/electronics-5.jpg', 'price' => 322, 'quantity' => 12, 'description' => 'سماعة بلوتوث محمولة', 'description_en' => 'Portable bluetooth speaker', 'category_id' => 5,],

            // ===== Cameras =====
            ['name' => 'كاميرا احترافية', 'name_en' => 'Professional Camera', 'imagepath' => 'assets/img/cameras-1.jpg', 'price' => 455, 'quantity' => 35, 'description' => 'كاميرا عالية الدقة', 'description_en' => 'High-resolution camera', 'category_id' => 6,],
            ['name' => 'كاميرا رقمية', 'name_en' => 'Digital Camera', 'imagepath' => 'assets/img/cameras-2.jpg', 'price' => 401, 'quantity' => 49, 'description' => 'كاميرا رقمية سهلة الاستخدام', 'description_en' => 'Easy-to-use digital camera', 'category_id' => 6,],
            ['name' => 'كاميرا تصوير فيديو', 'name_en' => 'Video Recording Camera', 'imagepath' => 'assets/img/cameras-3.jpg', 'price' => 365, 'quantity' => 36, 'description' => 'كاميرا مخصصة للفيديو', 'description_en' => 'Camera designed for video recording', 'category_id' => 6,],
            ['name' => 'كاميرا صغيرة', 'name_en' => 'Compact Camera', 'imagepath' => 'assets/img/cameras-4.jpg', 'price' => 220, 'quantity' => 26, 'description' => 'كاميرا صغيرة الحجم', 'description_en' => 'Compact size camera', 'category_id' => 6,],
            ['name' => 'كاميرا بعدسة قوية', 'name_en' => 'Strong Lens Camera', 'imagepath' => 'assets/img/cameras-5.jpg', 'price' => 440, 'quantity' => 31, 'description' => 'كاميرا بعدسة عالية الجودة', 'description_en' => 'Camera with high-quality lens', 'category_id' => 6,],
        ]);
    }
}
