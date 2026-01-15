<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Mody',
                'email' => 'mohamedkhaled@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$c4465mZ6ruB5fFj5WKSDK.lrUVw/u1Y.YYflZbuLvotGnxAgP5mW.', // hashed password
                'remember_token' => null,
                'created_at' => '2026-01-11 23:25:51',
                'updated_at' => '2026-01-11 23:25:51',
            ],
            [
                'name' => 'mody',
                'email' => 'mohamedkhaled10007@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$BGvjlASNhTgFJpDvom3XC.Ikcatc5SW0KuAGYC19/5rPbtVJEAwIS', // hashed password
                'remember_token' => null,
                'created_at' => '2026-01-12 16:53:48',
                'updated_at' => '2026-01-12 16:53:48',
            ],
        ]);
    }
}
