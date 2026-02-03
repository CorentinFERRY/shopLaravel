<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        DB::table('categories')->insert([
            [
                'name' => 'Électronique',
                'slug' => 'electronique',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vêtements',
                'slug' => 'vetements',
                'description' => 'Tout pour s\'habiller !',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maison',
                'slug' => 'maison',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accessoires',
                'slug' => 'accessoires',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jeux Vidéos',
                'slug' => 'jeux_videos',
                'description' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        */
        Category::factory()->count(5)->create();
    }
}
