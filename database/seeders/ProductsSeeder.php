<?php

namespace Database\Seeders;

use App\Models\ProductGroup;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productGroup1 = ProductGroup::create(['title' => 'Matkap']);
        $productGroup1->childs()->saveMany([
            new ProductGroup(['title' => 'Akülü Matkap']),
            new ProductGroup(['title' => 'Şarjlı Matkap'])
        ]);

        $productGroup2 = ProductGroup::create(['title' => 'Mikser']);
        $productGroup2->childs()->saveMany([
            new ProductGroup(['title' => 'Boya&Harç Mikseri'])
        ]);

        // sample product
        $sProductGroup1 = ProductGroup::where('title', 'Akülü Matkap')->first();
        $sProductGroup2 = ProductGroup::where('title', 'Boya&Harç Mikseri')->first();
        $product1 = Product::create([
            'name' => 'MX1455',
            'model' => 'MAX EXTRA',
            'photo' => 'notfound.jpg',
            'price' => 2115
        ]);
        $product2 = Product::create([
            'name' => 'MXP7580',
            'model' => 'MAX EXTRA',
            'photo' => 'notfound.jpg',
            'price' => 2115
        ]);
        $sProductGroup1->products()->saveMany([$product1]);
        $sProductGroup2->products()->saveMany([$product1, $product2]);
    }
}
