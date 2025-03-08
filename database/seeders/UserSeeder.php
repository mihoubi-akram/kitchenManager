<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'superAdmin@bgroup.com')->exists()) {
            User::create([
                'name' => 'superAdmin',
                'email' => env('SUPERADMIN_EMAIL'),
                'password' => Hash::make(env('SUPERADMIN_PASSWORD')),
            ]);
        }
    }
}
