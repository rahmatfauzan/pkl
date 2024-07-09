<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\products;
use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema ::disableForeignKeyConstraints();
        categories::truncate();
        Schema ::enableForeignKeyConstraints();
        categories::insert([
            [
                'name' => 'Electronics'],
            [
                'name' => 'Clothing'],
            [
                'name' => 'Books'],
            ]);
        products::insert([
            [
                'name' => 'Laptop',
                'description' => 'Laptop bagus ini',
                'price' => 100000,
                'category_id' => 1,
                'quantity' => 10
            ],
            [
                'name' => 'T-Shirt',
                'description' => 'T-Shirt bagus ini',
                'price' => 20000,
                'category_id' => 2,
                'quantity' => 5
            ],
            [
                'name' => 'Book',
                'description' => 'Book bagus ini',
                'price' => 7000,
                'category_id' => 3,
                'quantity' => 20

            ],
        ]);
        User::insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'role' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('111'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
                'email_verified_at' => now()
        ]]);
    }
}
