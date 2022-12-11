<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\View\Components\Product;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{ public function index($name)
    {
       $productos =  Producto::where('categoria_id', $name)->get();
       $categoria =  Categoria::where('id', $name)->first();

       if($categoria){
        return view('categories.index', compact('productos', 'categoria'));
       }

        return redirect("/");

    }
}
