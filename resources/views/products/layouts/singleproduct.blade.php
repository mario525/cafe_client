<section class="ftco-section">
    <div class="bcontainer">
        <form id="product_form" method="POST" enctype="multipart/form-data" autocomplete="off"
            action="{{ route('add_cart', $product->id) }}">
            @csrf
            <div class="row">


                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href={{ url('assets/img/cafe3.jpg') }} class="image-popup"><img
                            src={{ url('assets/img/cafe3.jpg') }} class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6  pl-md-5 ftco-animate">
                    <div class="product-details">
                        <h3>{{ $product->nombre }}</h3>

                        <p class="price"><span>${{ $product->precio }}</span></p>
                        <p>
                            {{ $product->descripcion }}
                        </p>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group d-flex">
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Small</option>
                                            <option value="">Medium</option>
                                            <option value="">Large</option>
                                            <option value="">Extra Large</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
                                <span class="input-group-btn mr-2">
                                    <button type="button" class="quantity-left-minus btn" data-type="minus"
                                        data-field="">
                                        <i class="ion-ios-remove"></i>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="form-control input-number"
                                    value="1" min="1" max="100" required="">
                                <span class="input-group-btn ml-2">
                                    <button type="button" class="quantity-right-plus btn" data-type="plus"
                                        data-field="">
                                        <i class="ion-ios-add"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="w-100"></div>

                        </div>
                    </div>
                    <button name="action" value="add_cart"
                        class="btn py-3 px-5 bg-white border border-green-400 hover:bg-green-600 hover:text-white"
                        aria-label="Add to cart" type="submit">
                        {{ __('Agregar al carrito') }}
                    </button>

                </div>

        </form>
    </div>
    </div>
</section>
