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
            [
                'name' => 'Nutella',
                'brand' => 'Ferrero',
                'store_name' => 'SuperMart',
                'category' => 'Spreads',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'G',
                'unit_quantity' => 400,
            ],
            [
                'name' => 'Coca Cola',
                'brand' => 'Coca Cola',
                'store_name' => 'SuperMart',
                'category' => 'Beverages',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'ML',
                'unit_quantity' => 330,
            ],
            [
                'name' => 'Sugar',
                'brand' => 'Domino',
                'store_name' => 'Grocery King',
                'category' => 'Baking',
                'type' => 'pack',
                'quantity' => 15,
                'unit_of_measure' => 'KG',
                'unit_quantity' => 1,
            ],
            [
                'name' => 'Chocolate',
                'brand' => 'Lindt',
                'store_name' => 'Sweet Shop',
                'category' => 'Confectionery',
                'type' => 'pack',
                'quantity' => 12,
                'unit_of_measure' => 'G',
                'unit_quantity' => 100,
            ],
            [
                'name' => 'Kinder',
                'brand' => 'Ferrero',
                'store_name' => 'SuperMart',
                'category' => 'Confectionery',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'G',
                'unit_quantity' => 20,
            ],
            [
                'name' => 'Vanilla',
                'brand' => 'McCormick',
                'store_name' => 'Grocery King',
                'category' => 'Baking',
                'type' => 'pack',
                'quantity' => 5,
                'unit_of_measure' => 'G',
                'unit_quantity' => 10,
            ],
            [
                'name' => 'Water',
                'brand' => 'Evian',
                'store_name' => 'SuperMart',
                'category' => 'Beverages',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'L',
                'unit_quantity' => 1.5,
            ],
            [
                'name' => 'Pepsi',
                'brand' => 'PepsiCo',
                'store_name' => 'SuperMart',
                'category' => 'Beverages',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'ML', 
                'unit_quantity' => 330, 
            ],
            [
                'name' => 'Coffee',
                'brand' => 'Nescafe',
                'store_name' => 'Coffee House',
                'category' => 'Beverages',
                'type' => 'pack',
                'quantity' => 10,
                'unit_of_measure' => 'G',
                'unit_quantity' => 50
            ],
            [
                'name' => 'Tea',
                'brand' => 'Lipton',
                'store_name' => 'Tea Corner',
                'category' => 'Beverages',
                'type' => 'pack',
                'quantity' => 7,
                'unit_of_measure' => 'G',
                'unit_quantity' => 25,
            ],
            [
                'name' => 'Juice',
                'brand' => 'Tropicana',
                'store_name' => 'SuperMart',
                'category' => 'Beverages',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'ML',
                'unit_quantity' => 1000,
            ],
            [
                'name' => 'Honey',
                'brand' => 'Nature\'s Way',
                'store_name' => 'Organic Shop',
                'category' => 'Health Foods',
                'type' => 'pack',
                'quantity' => 6,
                'unit_of_measure' => 'G',
                'unit_quantity' => 500,
            ],
            [
                'name' => 'Milk',
                'brand' => 'Lactalis',
                'store_name' => 'Dairy Mart',
                'category' => 'Dairy',
                'type' => 'unit',
                'quantity' => null,
                'unit_of_measure' => 'L',
                'unit_quantity' => 1,
            ],
            [
                'name' => 'Butter',
                'brand' => 'Land O\'Lakes',
                'store_name' => 'Dairy Mart',
                'category' => 'Dairy',
                'type' => 'pack',
                'quantity' => 9,
                'unit_of_measure' => 'G',
                'unit_quantity' => 250,
            ],
            [
                'name' => 'Jam',
                'brand' => 'Bonne Maman',
                'store_name' => 'SuperMart',
                'category' => 'Spreads',
                'type' => 'pack',
                'quantity' => 11,
                'unit_of_measure' => 'G',
                'unit_quantity' => 300,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
