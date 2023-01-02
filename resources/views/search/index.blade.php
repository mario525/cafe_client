@extends('layouts.app')

@section('content')
    <div class="">
        <!--Start Main Image -->
        @include('layouts.parts.mainimage', [
            'title' => $search,
            'category' => 'Buscador',
            'url' => '/',
        ])
        <!--End  Main Image -->

        <div class="bcontainer my-10">
            @if ($count == 0)
            <div class="w-full ">

                     <img class="w-1/4 mx-auto" src="{{url('assets/img/nosearch.jpg')}}" alt="Colorlib Template">
                     <h1 class="text-center">Sin Resultados</h1>

            </div>

            @endif
            <div class="row">
                @foreach ($posts as $item )
                <x-product :name="$item->nombre" :price="$item->precio" :id="$item->id"></x-product>
                @endforeach

            </div>
            {{ $posts->links() }}
        </div>

    </div>
@endsection
