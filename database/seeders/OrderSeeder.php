<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $products = Product::all();

        $users->each(function ($user) use ($products) {
            $orders = Order::factory(3)->create(['user_id' => $user->id]);

            $orders->each(function ($order) use ($products) {
                $order->products()->attach(
                    $products->random(5)->pluck('id'),
                    ['quantity' => rand(1, 10)]
                );
            });
        });
    }
}
