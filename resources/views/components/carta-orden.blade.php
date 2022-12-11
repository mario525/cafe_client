<div class="rounded overflow-hidden shadow-lg w-full md:w-3/12 mb-10 sm:h-96 sm:mr-2">
    <img class="w-full h-32" src="/assets/img/cafe2.jpg" alt="Sunset in the mountains">
    <div class="px-6 py-2">
        <div class="font-bold text-xl mb-2">Orden #{{ $value->id }}</div>

        @if ($value->estado_pedido_id == '1')
            <p class="text-gray-700 text-base">
                Pedido pendiente por ser aprobado
            </p>
        @elseif ($value->estado_pedido_id == '2')
            <p class="text-gray-700 text-base">
                El pedido fue acceptado y esta en espera de ser preparado
            </p>
        @elseif ($value->estado_pedido_id == '3')
            <p class="text-gray-700 text-base">
               El pedido se encuentra en preparacion
            </p>
        @elseif ($value->estado_pedido_id == '4')
            <p class="text-gray-700 text-base">
                Pedido listo para entregar, porfavor recoga su cafe
            </p>
        @endif
    </div>
    <div class="px-6 pt-4 pb-2 flex  flex-wrap">
        <a href="{{ route('order.show', ['order' => $value->id]) }}" type="button"
            class="btn  w-full bg-blue-200 rounded-full px-3 py-3 sm:py-1 text-sm font-semibold text-gray-700   mb-2">VER
            DETALLES DE PEDIDO</a>
        @if ($value->estado_pedido_id == '1')
            <a
                class=" w-full bg-red-200 rounded-full px-3 py-3 text-center  sm:py-1 text-sm font-semibold text-gray-700 mb-2">PENDIENTE</a>
            <form class="w-full" method="POST" action="{{ $href }}">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class=" w-full bg-red-500 rounded-full px-3 py-3 text-center  sm:py-1 text-sm font-semibold text-white mb-2 focus:outline-red-500">CANCELAR</button>
            </form>
        @elseif ($value->estado_pedido_id == '2')
            <a
                class=" w-full bg-orange-200 rounded-full px-3 py-3 text-center  sm:py-1 text-sm font-semibold text-gray-700 mb-2">ACCEPTADO</a>
        @elseif ($value->estado_pedido_id == '3')
            <a
                class=" w-full bg-yellow-200 rounded-full px-3 py-3 text-center  sm:py-1 text-sm font-semibold text-gray-700 mb-2">PREPARANDO</a>
        @elseif ($value->estado_pedido_id == '4')
            <a
                class=" w-full bg-orange-200 rounded-full px-3 py-3 text-center  sm:py-1 text-sm font-semibold text-gray-700 mb-2">LISTO
                PARA ENTREGA</a>
        @endif

    </div>
</div>
