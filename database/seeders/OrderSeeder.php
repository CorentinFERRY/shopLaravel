<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('orders')->insert([
            [
                'total' => 129.99,
                'status' => "pending",
                'user_id' => User::find(1)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'total' => 19.99,
                'status' => "delivered",
                'user_id' => User::find(1)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         ]);
    }
}
