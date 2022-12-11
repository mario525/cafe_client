<style>
    .collapse {
        visibility: visible !important;
    }
</style>

@php
    $cart_count = Cart::count();
@endphp

<div class="py-1 bg-yellow-700">
    <div class="bcontainer">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg text-slate-100 ftco_navbar bg-blue-800   " id="ftco-navbar">
    <div class="bcontainer">
        <a class="navbar-brand hover:text-slate-100 " href="/">UNEDL CAFE</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu "></span> Menu
        </button>

        <div class="navbar-collapse collapse " id="ftco-nav" style=".collapse:not(.show){display:none;}">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active  "><a href="/" class="nav-link hover:text-slate-100 ">Inicio</a></li>
                <li class="nav-item"><a href="/orders/pending" class="nav-link hover:text-slate-100 ">Mi Cuenta</a></li>
                <li class="nav-item cta cta-colored"><a href="/cart" class="nav-link hover:text-slate-100 " id='counter'><span
                            class="icon-shopping_cart"></span>@if ($cart_count)
                             [{{$cart_count}}]   @else [0]
                            @endif</a></li>

            </ul>
        </div>
    </div>
</nav>
