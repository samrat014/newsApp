<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'category_admin',
            'email' => 'category@admin.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('users')->insert([
            'name' => 'normal_user',
            'email' => 'user@user.com',
            'password' => Hash::make('password'),
            ]);
    }
}
