<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::get();

        $productGroups = ProductGroup::get();
        //$productGroups = ProductGroup::noParent()->get();

        return view('home.index', ['products' => $products, 'productGroups' => $productGroups]);
    }
}
