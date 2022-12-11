<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     /*   $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $red= PedidoDetalle::select('producto_id', DB::raw('COUNT(producto_id) as count'))
        ->groupBy('producto_id')
        ->orderBy('count', 'desc')
        ->take(3)->get();


       $productos_frios =  Producto::where('categoria_id', '1')->limit(4)->get();
       $productos_calientes =  Producto::where('categoria_id', '2')->limit(4)->get();

        return view('index', compact('productos_frios', 'productos_calientes'));
    }
}
