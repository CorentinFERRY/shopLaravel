<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            [
                'quantity' => 1,
                'unit_price' => Product::find(2)->price,
                'order_id' => 1,
                'product_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),     
            ],
            [
                'quantity' => 4,
                'unit_price' => Product::find(4)->price,
                'order_id' => 1,
                'product_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         ]);
    }
}
