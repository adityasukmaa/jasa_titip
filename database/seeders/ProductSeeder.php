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
        Product::create([
            'name'          => 'seblak',
            'price'         => 15_000,
            'description'   => '-',
            'product_img'   => 'seblak.jpeg',
            'toko_id'       => 1
        ]);
        Product::create([
            'name'          => 'basreng',
            'price'         => 20_000,
            'description'   => '-',
            'product_img'   => 'basreng.jpeg',
            'toko_id'       => 1
        ]);
        Product::create([
            'name'          => 'mie jebew',
            'price'         => 10_000,
            'description'   => '-',
            'product_img'   => 'mie jebew.jpeg',
            'toko_id'       => 1
        ]);


        Product::create([
            'name'          => 'siomay',
            'price'         => 15_000,
            'description'   => '-',
            'product_img'   => 'siomay.jpeg',
            'toko_id'       => 2
        ]);
        Product::create([
            'name'          => 'gorengan',
            'price'         => 20_000,
            'description'   => '-',
            'product_img'   => 'gorengan.jpeg',
            'toko_id'       => 2
        ]);
        Product::create([
            'name'          => 'nasi goreng',
            'price'         => 10_000,
            'description'   => '-',
            'product_img'   => 'nasi goreng.jpeg',
            'toko_id'       => 2
        ]);
    }
}
