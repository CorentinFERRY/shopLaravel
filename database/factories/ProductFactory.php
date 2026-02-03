<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
   
    protected $model = Product::class;

     /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => fake()->words(3, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(640, 480, 'products', true),
            'price' => fake()->randomFloat(2, 10, 500),
            'stock' => fake()->numberBetween(0, 100),
            'active' => fake()->boolean(80), // 80% de chances d'être true
            //'created_at' => now(),
            //'updated_at' => now(),
            'category_id' => Category::inRandomOrder()->first()->id
                                    
        ];
    }
}
