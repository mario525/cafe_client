@extends('layouts.app')
@section('content')
    <section class="bcontainer">
        <div class="px-6 h-full text-gray-800 my-10">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="assets/img/cafe_heart.webp" class="w-full rounded-xl" alt="Sample image" />
                </div>

                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    @include('layouts.alert')
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-jet-label for="email" value="Correo" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="Contraseña" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">Recuerdame</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                    href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            @endif


                            <button
                                class="inline-flex items-center px-4 py-2 bg-transparent border border-blue-500 rounded-md font-semibold text-xs text-blue-700 uppercase tracking-widest hover:bg-blue-700 hover:text-white focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4">
                                Iniciar Sesion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
