<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            'Пицца',
            'Напитки',
            'Закуски',
            'Комбо',
        ];

        array_map(function ($v) {
            $item = new Category();
            $item->title = $v;
            $item->save();
        }, $category);

    }
}
