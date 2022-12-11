<div class="mt-12 lg:mt-0 lg:w-3/4">
    <div class="bg-gray-100 py-8 px-5 md:px-8">
        <h1 class="font-hkbold pb-6  text-2xl  sm:text-left">
            Historial
        </h1>
        <div class="hidden sm:block">
            <div class="flex justify-between pb-3">
                <div class="w-1/3 pl-4 md:w-2/5">
                    <span class=" text-sm uppercase  text-black font-bold">ID</span>
                </div>
                <div class="w-1/4 text-center xl:w-1/5">
                    <span class="font-bold text-sm uppercase text-black">Fecha de orden</span>
                </div>
                <div class="mr-3 w-1/6 text-center md:w-1/5">
                    <span class="font-bold text-sm uppercase text-black">Precio</span>
                </div>
                <div class="w-3/10 text-center md:w-1/5">
                    <span class="font-bold pr-8 text-sm uppercase md:pr-16 xl:pr-8 text-black">Status</span>
                </div>
            </div>
        </div>
        @foreach ($pedidos as $pedido)
            <div
                class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
                <div
                    class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
                    <span class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">ID
                    </span>
                    <div class="relative mx-auto w-20 sm:mx-0 sm:mr-3 sm:pr-0">
                        <div class="aspect-w-1 aspect-h-1 w-full">
                            <img src="https://source.unsplash.com/1000x640/?oes-3" alt="product image"
                                class="object-cover" />
                        </div>
                    </div>
                    <a href="{{ route('order.show', ['order' => $pedido->id])  }}" class="mt-2 font-hk text-base  hover:text-blue-400">#{{$pedido->id}}</a>
                </div>
                <div class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/5 sm:border-b-0 sm:pb-0">
                    <span
                        class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">Fecha
                        de orden</span>
                    <span class="font-hk text-secondary">{{$pedido->created_at}}</span>
                </div>
                <div
                    class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/6 sm:border-b-0 sm:pr-6 sm:pb-0 sm:text-right xl:w-1/5 xl:pr-16">
                    <span
                        class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">Precio</span>
                    <span class="font-hk text-secondary">${{$pedido->total}}</span>
                </div>
                <div class="w-full text-center sm:w-3/10 sm:text-right md:w-1/4 xl:w-1/5">
                    <div class="pt-3 sm:pt-0">
                        <p class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">
                            Status
                        </p>
                        @if ($pedido->estado_pedido_id=="1")
                        <span
                        class="bg-primary-lightest border-2 border-gray-500 px-4 py-3 inline-block rounded-full font-hk text-primary">
                        PENDIENTE</span>
                        @elseif ($pedido->estado_pedido_id=="2")
                        <span
                        class="bg-primary-lightest border-2 border-yellow-400 px-4 py-3 inline-block rounded-full font-hk text-primary">
                        ACCEPTADO</span>
                        @elseif ($pedido->estado_pedido_id=="3")
                        <span
                        class="bg-primary-lightest border-2 border-yellow-400 px-4 py-3 inline-block rounded-full font-hk text-primary">
                        PREPARANDO</span>
                        @elseif ($pedido->estado_pedido_id=="4")
                        <span
                        class="bg-primary-lightest border-2 border-orange-400 px-4 py-3 inline-block rounded-full font-hk text-primary">
                        LISTO PARA ENTREGA</span>
                        @elseif ($pedido->estado_pedido_id=="5")
                        <span
                        class="bg-primary-lightest border-2 border-green-400 px-4 py-3 inline-block rounded-full font-hk text-primary">
                        ENTREGADO</span>
                        @elseif ($pedido->estado_pedido_id=="6")
                        <span
                        class="bg-primary-lightest border-2 border-red-400 px-4 py-3 inline-block rounded-full font-hk text-primary">
                        CANCELADO</span>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
       <!--
        <div class="flex justify-center pt-6 md:justify-end">
            <span
                class="cursor-pointer pr-5 font-hk font-semibold text-grey-darkest transition-colors hover:text-black">Previous</span>
            <span
                class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-hk text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">1</span>
            <span
                class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-hk text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">2</span>
            <span
                class="mr-3 flex h-6 w-6 cursor-pointer items-center justify-center rounded-full font-hk text-sm font-semibold text-black transition-colors hover:bg-primary hover:text-white">3</span>
            <span
                class="cursor-pointer pl-2 font-hk font-semibold text-grey-darkest transition-colors hover:text-black">Next</span>

        </div>
    -->
          {{-- Paginacion --}}
  {{ $pedidos->links() }}
  {{-- Fin de Paginacion --}}
    </div>
</div>
