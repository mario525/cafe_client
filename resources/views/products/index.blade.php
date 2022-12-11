@extends('layouts.app')
@section('content')
      <!--Start Main Image -->
      @include('layouts.parts.mainimage', [
        'title' => 'Producto',
        'category' => 'Cafe',
        'url' => 'wwww.facebook.com',
    ])
      <!--End  Main Image -->
       <!--Start Single Product -->
      @include('products.layouts.singleproduct')
       <!--End Single Product -->
        <!--Start Related Product  -->
        @include('products.layouts.relatedproducts')
        <!--End Related Product  -->


@endsection

@push('js')
       @include('products.scripts.scripts')
@endpush


