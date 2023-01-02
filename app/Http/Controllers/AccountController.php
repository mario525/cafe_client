<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pedidos =  Pedido::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(5);



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

    public function pendingorder(Pedido $order)
    {

        $pedidos =  Pedido::where('user_id', Auth::id())->where('estado_pedido_id', '1')->orwhere('estado_pedido_id', '2')->orwhere('estado_pedido_id', '3')->orwhere('estado_pedido_id', '4')->orderBy('id', 'desc')->get();

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
        if ($order->estado_pedido_id == 1) {
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

    public function userdetails(Pedido $order)
    {
        $pedido_detalles =  PedidoDetalle::where('pedido_id', $order->id)->get();
        return view('account.profile.index', compact(['pedido_detalles', 'order']));
    }

    public function actualizarcontra(Request $request)
    {

        $user =  User::where('id', Auth::user()->id)->first();


        if (Hash::check($request->current_password, Auth::user()->password)) {
            $data = [
                'password' => bcrypt($request->password),
                'updated_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                'updated_by' => Auth::user()->name
            ];



            // Actualiza el registro en la BD
            $user->update($data);


            $notification = array(
                'message' => 'La contraseña ha sido actualizado',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Contraseña actual no coincide, datos no cambiados',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function actualizardato(Request $request)
    {

        $user =  User::where('id', Auth::user()->id)->first();


            request()->validate([
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
            ],
            [
                'phone' => 'Ingrese un numero de telefono valido!',
            ]);

            $data = [
                'phone' => $request->phone,
                'updated_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                'updated_by' => Auth::user()->name
            ];



            // Actualiza el registro en la BD
            $user->update($data);


            $notification = array(
                'message' => 'Los datos han sido actualizados',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);


    }
}
