<div class="mt-12 lg:mt-0 lg:w-3/4">
    <div class="bg-gray-100 py-8 px-5 md:px-8">
        <h1 class="font-hkbold pb-6  text-2xl  sm:text-left">
            Detalles de Pedido
        </h1>
        <div class=" flex  flex-wrap mt-6 mb-2">
            <div class="w-full md:w-1/2  px-3 pb-4 sm:pb-0">
                <label for="order_id" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                    {{ __('Order Number') }}
                </label>
                <input type="text" id="order_id" name="order_id" class="form-input w-full" value="{{ $order->id }}"
                    readonly>

            </div>
            <div class="w-full md:w-1/2   px-3 pb-4 sm:pb-0">
                <label for="created_at" class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                    {{ __('Date of order') }}
                </label>
                <input type="text" id="created_at" name="created_at" class="form-input w-full"
                    data-tooltip-target="tooltip-default" value="{{ $order->created_at }}" readonly>
                <div id="tooltip-default" role="tooltip"
                    class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                    {{ $order->created_at }}
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <div class="hidden sm:block">
            <div class="flex justify-between pb-3">
                <div class="w-1/3 pl-4 md:w-2/5">
                    <span class=" text-sm uppercase  text-black font-bold">Nombre</span>
                </div>
                <div class="w-1/4 text-center xl:w-1/5">
                    <span class="font-bold text-sm uppercase text-black">Cantidad</span>
                </div>
                <div class="mr-3 w-1/6 text-center md:w-1/5">
                    <span class="font-bold text-sm uppercase text-black">Precio</span>
                </div>
                <div class="w-3/10 text-center md:w-1/5">
                    <span class="font-bold pr-8 text-sm uppercase md:pr-16 xl:pr-8 text-black">Precio Total</span>
                </div>
            </div>
        </div>
        @foreach ($pedido_detalles as $item)
            <div
                class="mb-3 flex flex-col items-center justify-between rounded bg-white px-4 py-5 shadow sm:flex-row sm:py-4">
                <div
                    class="flex w-full flex-col border-b border-grey-dark pb-4 text-center sm:w-1/3 sm:border-b-0 sm:pb-0 sm:text-left md:w-2/5 md:flex-row md:items-center">
                    <span class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">Nombre
                    </span>
                    <div class="relative mx-auto w-20 sm:mx-0 sm:mr-3 sm:pr-0">
                        <div class="aspect-w-1 aspect-h-1 w-full">
                            <img src="https://source.unsplash.com/1000x640/?oes-3" alt="product image"
                                class="object-cover" />
                        </div>
                    </div>
                    <span class="mt-2 font-hk text-base text-secondary">{{$item->producto->nombre}}</span>
                </div>
                <div class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/5 sm:border-b-0 sm:pb-0">
                    <span
                        class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">Cantidad</span>
                    <span class="font-hk text-secondary">{{$item->cantidad}}</span>
                </div>
                <div
                    class="w-full border-b border-grey-dark pb-4 text-center sm:w-1/6 sm:border-b-0 sm:pr-6 sm:pb-0 sm:text-right xl:w-1/5 xl:pr-16">
                    <span
                        class="font-hkbold block pt-3 pb-2 text-center text-sm uppercase text-secondary sm:hidden">Subtotal</span>
                    <span class="font-hk text-secondary">{{$item->subtotal}}</span>
                </div>
                <div class="w-full text-center sm:w-3/10 sm:text-right md:w-1/4 xl:w-1/5">
                    <div class="pt-3 sm:pt-0">
                        <p class="font-hkbold block pb-2 text-center text-sm uppercase text-secondary sm:hidden">
                            Total
                        </p>
                            {{$item->total}}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="flex justify-end flex-wrap-reverse">
            <div class="w-1/2 md:w-1/4">

                <div class="px-3 flex">
                    <div class="w-3/5 md:w-1/2">
                        <span class="font-hk text-secondary">{{__("Total")}}: </span>
                    </div>
                    <div class="w-1/4">
                        <span class="font-hk text-secondary">${{ $order->total }} </span>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
