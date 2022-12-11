<section class="ftco-section">
    <div class="bcontainer">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Productos Seleccionados</span>
                <h2 class="mb-4">Cafes Frios</h2>
                <p></p>
            </div>
        </div>
    </div>
    <div class="bcontainer">
        <div class="row">
            @foreach ($productos_frios as $item )
            <x-product :name="$item->nombre" :price="$item->precio" :id="$item->id"></x-product>
            @endforeach
        </div>
    </div>

    <div class="bcontainer">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Cafes Calientes</h2>
               <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
            </div>
        </div>
    </div>
    <div class="bcontainer">
        <div class="row">
            @foreach ($productos_calientes as $item )
            <x-product :name="$item->nombre" :price="$item->precio" :id="$item->id"></x-product>
            @endforeach

        </div>
    </div>
</section>
