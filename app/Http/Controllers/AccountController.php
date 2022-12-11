<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos=  Pedido::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(5);



        return view('account.index', compact(['pedidos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $order)
    {
     $pedido_detalles =  PedidoDetalle::where('pedido_id', $order->id)->get();
        return view('account.details.index', compact(['pedido_detalles', 'order']));
    }

    public function pendingorder(Pedido $order){

        $pedidos=  Pedido::where('user_id', Auth::id())->where('estado_pedido_id', '1')->orwhere('estado_pedido_id', '2')->orwhere('estado_pedido_id', '3')->orwhere('estado_pedido_id', '4')->orderBy('id', 'desc')->get();

        return view('account.pending.index', compact(['pedidos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $order)
    {
        if($order->estado_pedido_id==1){
        $data = ([
            'estado_pedido_id'          => 5,
            'updated_at'        => Carbon::now()->setTimezone('America/Mexico_City'),
            'updated_by'        => Auth::user()->name,
        ]);
        $order->update($data);
        return redirect('/orders/pending');
        } else {
        return redirect('/orders/pending');
        }

    }
}
