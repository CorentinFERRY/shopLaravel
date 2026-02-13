<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->count(50)->create();
        Product::factory()->count(5)->outOfStock()->create();
        Product::factory()->count(5)->inactive()->create();
        Product::factory()->count(5)->expensive()->create();
    }
}
