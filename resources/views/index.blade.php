@extends('layouts.app')

@section('content')
    <div class="">
        <!--Start Main Image -->
        @include('layouts.parts.mainimage', [
            'title' => 'Bienvenido',
            'category' => 'Inicio',
            'url' => '/',
        ])
        <!--End  Main Image -->
        <!--Start Simbols -->
        @include('layouts.parts.simbols')
        <!--End Simbols -->
        <!--Start Category -->
        @include('layouts.parts.category')
        <!--End Category -->
        <!--Start Products -->
        @include('layouts.parts.product')
        <!--End Products -->

    </div>
@endsection
