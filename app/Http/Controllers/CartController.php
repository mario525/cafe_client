<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Exception;
use App\Models\Producto;
use App\Services\LaravelClientService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_subtotal = Cart::subtotal();
        $cart_total = Cart::total();
        $cart_counter = Cart::count();

        if ($request->ajax()) {
            return view(
                'cart.ajax-load',
                [
                    'carts' => $carts, 'cart_qty' =>  $cart_qty, 'cart_total' => $cart_total, 'cart_counter'=> $cart_counter
                ]
            )->render();

                }
        return view('cart.index', compact(['carts', 'cart_qty', 'cart_subtotal', 'cart_total', 'cart_counter']));
    }




    // Funcion para remover un producto del carrito de compras
    public function removeCartProduct(Request $request)
    {
        Cart::remove($request->id);
        return response()->json(['success' => __('Successful removal of the cart')]);
    }

    // Funcion para actualizar la cantidad del item del carrito.
    public function updateQty(Request $request)
    {
        // Registro seleccionado del carrito

        $row = Cart::get($request->id);

        // Busca el producto en base al id
        $product =  Producto::where('id', $row->id)->first();

        // Variable que almacena el mensaje que se muestra al agregar al carrito
        $msg = '';
        $type_msg   = '';

        // Obtengo todo lo que hay en el carrito
        $cart = Cart::content();
        $count = 0;

        // Obtengo cuantos productos del mismo id ya hay en el carrito
        foreach ($cart as $item) {
            if ($item->id == $product->id) {
                $count += $item->qty;
            }
        }

        if ($request->qty < $row->qty) {
            $count -= 1;
        } else if (($request->qty > $row->qty)) {
            $count += 1;
        }
        // Obtengo el stock disponible
        // En lo que obtenemos el quantity de odoo lo voy a hadcodear
        $stock = 100;

        //Al stock le quito lo que ya pudiera tener en el carrito
        $stock = $stock - $count;
        // Reviso si el stock es mayor a 0
        if ($stock >= 0) {
            Cart::update($request->id, $request->qty);
            $msg = __('Cantidad Actualizado');
            $type_msg = 'success';
        } else {
            $msg = __('You can no longer add more of this product to the cart');
            $type_msg = 'warning';
        }

        return response()->json([
            'msg' => $msg, 'type' => $type_msg
        ]);
    }

    // Función que agrega al carrito
    public function addCart(Request $request, $product)
    {
        $carts = Cart::content();

    //    dd($carts);
        // Busca el producto en base al id
        $product =  Producto::where('id', $product)->first();
        // Obtengo la cantidad de producto ingresada por el usuario
        $qty = $request->quantity;

        // agrega los datos al carrito julio
        try {
            Cart::add([
                'id' => $product->id,
                'name' => $product->nombre,
                'qty' => $qty,
                'price' =>  $product->precio,
                'weight' => 0,
                'options' => [
                    'image' => $product->imagen,
                ],
            ]);
            // Retornamos a la vista
        } catch (Exception $e) {

            #Alerta de error
            $notification = array(
                'message' => $e->getMessage(), 'alert-type' => 'error'
            );

            #Retornamos a la vista
            return redirect()->back()->with($notification);
        }

        $msg = __('Carrito actualizado!');
        $msgType = 'success';

        $notification = array(
            'message' => $msg,
            'alert-type' => $msgType
        );

        switch ($request->input('action')) {
            case 'add_cart':

                return redirect()->back()->with($notification);
                break;
        }
    }

    /// remove mini cart
    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        return response()->json([
            'msg' => __('Item removed from cart')
        ]);
    } // end mehtod

      /// remove mini cart
      public function finalorder(Request $request)
      {
        $cart_subtotal = str_replace(array(","), '', Cart::subtotal());
        $cart_subtotal = floatval($cart_subtotal);

        $cart_total = str_replace(array(","), '', Cart::total());
        $cart_total = floatval($cart_total);
        $carts = Cart::content();

        try {
          //Si no hay producto en la canasta no se hace compra
          if(count($carts)==0){
            return redirect('/cart');
          }

            //Datos para crear la orden
            $data_order = ([
                'user_id' => Auth::user()->id,
                'estado_pedido_id' => 1,
                'subtotal' => $cart_subtotal,
                'total' => $cart_total,
                'detalle_comentario' => $request->message,
                'estatus' => __('ACTIVO'),
                'created_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                'updated_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                'created_by' => 'SISTEMA',
                'updated_by' => 'SISTEMA',

            ]);
           //Creamos los detalles de la orden
            $order_id = Pedido::create($data_order)->id;

            foreach($carts as $cart) {
                $data_order_details = ([
                'pedido_id' => $order_id,
                'producto_id' => $cart->id,
                'cantidad' => $cart->qty,
                'subtotal' => $cart->price,
                'total' => $cart->total,
                'estatus' => __('ACTIVO'),
                'created_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                'updated_at' => Carbon::now()->setTimezone('America/Mexico_City'),
                'created_by' => 'SISTEMA',
                'updated_by' => 'SISTEMA',

            ]);
              Cart::remove($cart->rowId);
              $order_details_id = PedidoDetalle::create($data_order_details)->id;
            }





            //La enviamos
            $data = [
                'order_id' => $order_id,
                'order_details_id' => $order_details_id,
            ];
            return redirect('/orders/pending')->with($data);
        } catch (\Exception $e) {
            dd($e->getmessage());
        }
      } // end mehtod

}
