<section class="ftco-section ">
    <div class="bcontainer">
        <form id="final_form" method="POST" enctype="multipart/form-data" autocomplete="off"
            action="{{ route('final_order') }}">
            @csrf
            <!--Start Table  -->
            <div class="overflow-x-auto relative">
                <section class="section_cart">
                    @include('cart.ajax-load', [
                        'carts' => $carts,
                    ])
                </section>

            </div>
            <!--End Table  -->
            <div id="gif_cart" class="hidden">
                <section class="hero container max-w-screen-lg mx-auto pb-10">
                    <img class="mx-auto" src="{{ asset('assets/img/loading.gif') }}" alt="screenshot">
                </section>
            </div>

            <div class="justify-content-end flex flex-wrap -mx-4">
                <!--Start Comment  -->
                <div class="flex mt-5  ftco-animate w-full sm:w-1/2">
                    <div class="cart-total ">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Comentarios</label>
                        <textarea id="message" name="message" rows="8"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  "
                            placeholder="Algun detalle para tu pedido?"></textarea>
                    </div>

                </div>
                <!--End Comment  -->
                <!--Start Total  -->
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span id="price_subtotal">${{ $cart_subtotal }}</span>
                        </p>

                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span id="price_total">${{ $cart_total }}</span>
                        </p>
                    </div>

                    <button type="submit" name="final" value="final_cart"
                        class="btn py-3 px-5 bg-white border border-green-400 hover:bg-green-600 hover:text-white"
                        aria-label="final" type="submit">
                        {{ __('Finalizar Compra') }}
                    </button>
                </div>
                <!--End Total  -->
            </div>

        </form>
    </div>


</section>
