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
            'Четыре сыра',
            'Овощи и грибы',
            'Гавайская',
            'Двойная пепперони',
            '2 пиццы и напиток',
            '3 пиццы',
            '3 пиццы от 849 ₽',
            'Латте',
            'Капучино',
            'Добрый Cola',
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

        $productsImages = [
            'http://127.0.0.1:8000/storage/images/pipperoni.png',
            'http://127.0.0.1:8000/storage/images/vetchina_cheese.png',
            'http://127.0.0.1:8000/storage/images/margarita.png',
            'http://127.0.0.1:8000/storage/images/diablo.png',
            'http://127.0.0.1:8000/storage/images/4_sizon.png',
            'http://127.0.0.1:8000/storage/images/4_cheese.png',
            'http://127.0.0.1:8000/storage/images/ovochi_gribi.png',
            'http://127.0.0.1:8000/storage/images/gavaiskaya.png',
            'http://127.0.0.1:8000/storage/images/dvoinaya_pipperoni.png',
            'http://127.0.0.1:8000/storage/images/2_pizzi_napitok.png',
            'http://127.0.0.1:8000/storage/images/3_pizzi.png',
            'http://127.0.0.1:8000/storage/images/3_pizzi_ot_849.png',
            'http://127.0.0.1:8000/storage/images/latte.png',
            'http://127.0.0.1:8000/storage/images/kapuchino.png',
            'http://127.0.0.1:8000/storage/images/pepsi.png',
            'http://127.0.0.1:8000/storage/images/molochni.png',
            'http://127.0.0.1:8000/storage/images/sok_vishnevi.png',
            'http://127.0.0.1:8000/storage/images/krilia_kurinii.png',
            'http://127.0.0.1:8000/storage/images/sirnii_palochki.png',
            'http://127.0.0.1:8000/storage/images/kartof_is_pichi.png',
            'http://127.0.0.1:8000/storage/images/lanchbox.png',
        ];

        foreach ($productsTitle as $key => $value) {
            if (isset($products[$key])) {
                $products[$key]->image = $productsImages[$key];
                $products[$key]->save();
            }
        }

        $productPrice = [
            450,
            439,
            480,
            490,
            420,
            419,
            439,
            490,
            495,
            470,
            1099,
            849,
            149,
            125,
            120,
            160,
            110,
            249,
            220,
            160,
            259,
        ];

        foreach ($productsTitle as $key => $value) {
            if (isset($products[$key])) {
                $products[$key]->price = $productPrice[$key];
                $products[$key]->save();
            }
        }

    }
}
