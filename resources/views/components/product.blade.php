<div class="col-md-6 col-lg-3 ftco-animate">
    <div class="product">
        <a href="/product/{{$id}}" class="img-prod sm:h-52">
            <div class="sm:w-64  h-80">
                <img class="w-fit h-fit" src="{{url($image)}}" alt="Colorlib Template">
            </div>
            @if ($discountper)
                <span class="status bg-green-500">{{ $discountper }}%</span>
            @endif

            <div class="overlay"></div>
        </a>
        <div class="text py-3 pb-6 px-3 text-center sm:h-20">
            <h3><a href="/product/{{$id}}">{{ $name }}</a></h3>
            <div class="d-flex">
                <div class="pricing">
                    <p class="price"><span
                            class="@if ($discountper) price-dc @endif ">${{ $price }}</span>
                        @if ($discountper)
                            <span class="price-sale">${{ $discountprice }}</span>
                        @endif

                    </p>
                </div>
            </div>
            <div class="bottom-area d-flex px-3">
                <div class="m-auto d-flex">
                    <a href="/product/{{$id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                        <span><i class="ion-ios-cart"></i></span>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
