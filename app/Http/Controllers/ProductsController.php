<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGroup;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        $productGroupId = $request->get('productGroupId');
        if($productGroupId) {
            $productGroup = ProductGroup::findOrFail($productGroupId);
            return view('products.index', ['products' => $productGroup->products]);
        }else {
            $products = Product::paginate(5);
            return view('products.index', ['products' => $products]);
        }
    }

}
