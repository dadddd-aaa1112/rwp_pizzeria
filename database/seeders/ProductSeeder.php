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
        $products = Product::all();

        $productsTitle = [
            'Пепперони',
            'Ветчина и грибы',
            'Маргарита',
            'Диабло',
            'Четыре сезона',
            'Овощи и грибы',
            'Гавайская',
            'Двойная пепперони',
            '2 пиццы и напиток',
            '3 пиццы',
            '3 пиццы от 849 ₽',
            'Латте',
            'Капучино',
            'Pepsi',
            'Молочный коктейль',
            'Сок вишневый',
            'Куриные крылья',
            'Сырные палочки',
            'Картофель из печи',
            'Ланчбокс с куриными кусочками',

        ];

        $productsCategory = [
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            1,
            4,
            4,
            4,
            2,
            2,
            2,
            2,
            2,
            3,
            3,
            3,
            3,

        ];


        foreach ($productsTitle as $key => $value) {
            if (isset($products[$key])) {
                $products[$key]->title = $productsTitle[$key];
                $products[$key]->category_id = $productsCategory[$key];
                $products[$key]->save();
            }
        }

    }
}
