<div class="lg:w-1/4">
    <p class="pb-6 font-butler text-2xl text-secondary sm:text-3xl lg:text-4xl">
        Mi Cuenta
    </p>
    <div class="flex flex-col pl-3">
            <x-profile-sidebar name="Pedidos Pendientes" href="/orders/pending" url="order.pending" ></x-profile-sidebar>
            <x-profile-sidebar name="Historial" href="/order" url="order.index" url2="order.show" ></x-profile-sidebar>
            <x-profile-sidebar name="Detalles de Perfil" href="/d" url="red" ></x-profile-sidebar>

    </div>
    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="inline-flex items-center px-4 py-2 bg-transparent border border-blue-700 rounded-md font-semibold text-xs text-blue-600 uppercase tracking-widest hover:bg-blue-700 hover:text-white focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-3">
            cerrar sesión
        </button>
    </form>
    {{-- Logout --}}
</div>
