<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Order;
use App\Models\Price;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //      $this->call(RolesSeeder::class);
   // $this->call(CategorySeeder::class);
        // Price::factory(20)->create();
        //   User::factory(10)->create();
        // Product::factory(20)->create();
//Order::factory(20)->create();
        $this->call(ProductSeeder::class);

    }
}
