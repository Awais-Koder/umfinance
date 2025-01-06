<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seos')->insert([
            [
                'page' => 'home',
                'title' => 'Welcome to My Website',
                'meta_description' => 'This is the description for the home page.',
                'meta_keywords' => 'home, welcome, website',
                'canonical_url' => url('/'),
                'og_title' => 'Welcome to My Website',
                'og_description' => 'This is the description for the home page.',
                'og_image' => url('/images/home-og.png'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'page' => 'about',
                'title' => 'About Us',
                'meta_description' => 'Learn more about us.',
                'meta_keywords' => 'about, team, company',
                'canonical_url' => url('/about'),
                'og_title' => 'About Us',
                'og_description' => 'Learn more about us.',
                'og_image' => url('/images/about-og.png'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
