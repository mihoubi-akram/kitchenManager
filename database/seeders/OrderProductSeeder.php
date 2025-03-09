<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::factory(10)->create();
        $products = Product::all();

        $orders->each(function ($order) use ($products) {
            $order->products()->attach(
                $products->random(5)->pluck('id'),
                ['quantity' => rand(1, 10)]
            );
        });
    }
}
