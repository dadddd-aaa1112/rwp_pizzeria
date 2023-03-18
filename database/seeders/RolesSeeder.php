<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $st = [
            'buyer',
            'seller',
            'admin',
        ];

        foreach ($st as $v) {
            $item = new Role();
            $item->title = $v;
            $item->save();
        }
    }
}
