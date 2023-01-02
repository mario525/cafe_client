<div class="bcontainer">
    <form action="{{ route('buscar') }}" method="GET">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="searchme" name="searchme"
                class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                placeholder="Capuchino..." required>
            <button type="submit"
                class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
        </div>
    </form>
</div>
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
            @foreach ($productos_frios as $item)
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
            @foreach ($productos_calientes as $item)
                <x-product :name="$item->nombre" :price="$item->precio" :id="$item->id"></x-product>
            @endforeach

        </div>
    </div>
</section>
