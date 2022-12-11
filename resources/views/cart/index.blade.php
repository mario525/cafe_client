@extends('layouts.app')
@section('content')
  <!--Start Main Image -->
  @include('layouts.parts.mainimage', [
    'title' => 'Carrito de Compras',
    'category' => 'Inicio',
    'url' => '/',
])
  <!--End  Main Image -->
 <!--Start Shopping List -->
 @include('cart.layouts.shoppinglist')
 <!--End Shopping List -->

@endsection
