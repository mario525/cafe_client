<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\View\Components\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($product , Request $request)
    {
        #Obtenemos el objeto del producto.
        $product = Producto::where('id', $product )->first();




        return view('products.index', compact(['product']));

    }
}
