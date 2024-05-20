<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        News::create([
            "category" => "politics",
            "title" => "title",
            "content" => "this is politics content",
            "user_id" => 1
        ]);

        News::create([
            "category" => "health",
            "title" => "health",
            "content" => "this is health content",
            "user_id" => 2
        ]);
    }
}
