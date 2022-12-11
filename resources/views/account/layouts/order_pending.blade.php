<div class="mt-12 lg:mt-0 lg:w-3/4 ">
    <div class="bg-gray-100 py-8 px-5 md:px-8 h-full">
        <h1 class="font-hkbold pb-6  text-2xl  sm:text-left">
            Pedidos Pendientes
        </h1>
        @if (count($pedidos) == 0)
            <p>Ningun pedido reciente</p>
            @else
            <div class="flex flex-wrap justify-start">

                @foreach ($pedidos as $pedido)
                    <x-carta-orden :value="$pedido" href="{{ route('order.destroy', ['order' => $pedido->id]) }}">
                    </x-carta-orden>
                @endforeach
            </div>

        @endif


    </div>
</div>
