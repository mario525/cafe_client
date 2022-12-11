@extends('layouts.app')

@section('content')
    <div class="">
        <!--Start Main Image -->
        @include('layouts.parts.mainimage', [
            'title' => $categoria->nombre,
            'category' => 'Categoria',
            'url' => '/',
        ])
        <!--End  Main Image -->

        <div class="bcontainer my-10">
            <div class="row">
                @foreach ($productos as $item )
                <x-product :name="$item->nombre" :price="$item->precio" :id="$item->id"></x-product>
                @endforeach

            </div>
        </div>

    </div>
@endsection
