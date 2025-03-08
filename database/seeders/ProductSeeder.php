<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Nutella', 'brand' => 'Ferrero', 'type' => 'unit', 'quantity' => 10],
            ['name' => 'Coca Cola', 'brand' => 'Coca Cola', 'type' => 'unit', 'quantity' => 20],
            ['name' => 'Sugar', 'brand' => 'Domino', 'type' => 'pack', 'quantity' => 15],
            ['name' => 'Chocolate', 'brand' => 'Lindt', 'type' => 'pack', 'quantity' => 12],
            ['name' => 'Kinder', 'brand' => 'Ferrero', 'type' => 'unit', 'quantity' => 8],
            ['name' => 'Vanilla', 'brand' => 'McCormick', 'type' => 'pack', 'quantity' => 5],
            ['name' => 'Water', 'brand' => 'Evian', 'type' => 'unit', 'quantity' => 25],
            ['name' => 'Pepsi', 'brand' => 'PepsiCo', 'type' => 'unit', 'quantity' => 18],
            ['name' => 'Coffee', 'brand' => 'Nescafe', 'type' => 'pack', 'quantity' => 10],
            ['name' => 'Tea', 'brand' => 'Lipton', 'type' => 'pack', 'quantity' => 7],
            ['name' => 'Juice', 'brand' => 'Tropicana', 'type' => 'unit', 'quantity' => 14],
            ['name' => 'Honey', 'brand' => 'Nature\'s Way', 'type' => 'pack', 'quantity' => 6],
            ['name' => 'Milk', 'brand' => 'Lactalis', 'type' => 'unit', 'quantity' => 22],
            ['name' => 'Butter', 'brand' => 'Land O\'Lakes', 'type' => 'pack', 'quantity' => 9],
            ['name' => 'Jam', 'brand' => 'Bonne Maman', 'type' => 'pack', 'quantity' => 11],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
