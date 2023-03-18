<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\RelationProductUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::all()->random()->id;
        return [
            'user_id' => User::get()->random()->id,
            'product_id' => Product::get()->random()->id,
            'count' => random_int(1,7),
        ];
    }
}
