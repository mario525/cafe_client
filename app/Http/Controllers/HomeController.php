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

    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('searchme');

        // Search in the title and body columns from the posts table
        $count = Producto::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->count();
        $posts = Producto::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->paginate(10);
          $posts->appends(['searchme' => $search]);

        // Return the search view with the resluts compacted
        return view('search.index', compact('posts' , 'search', 'count'));
    }
}
