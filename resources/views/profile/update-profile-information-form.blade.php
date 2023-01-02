<div class="flex flex-wrap w-full">
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6  rounded-lg bg-slate-100 border-2">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-slate-700 text-xl font-bold">
                        {{ __('Informacion Personal') }}
                    </h6>
                </div>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                @include('layouts.alert')
                <form method="POST" action="{{ route('actualizar.dato') }}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('POST')
                    <div class="flex flex-wrap mt-6">
                        <div class="w-full md:w-1/2 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="name">
                                    {{ __('Nombre') }}
                                </label>
                                <input id="name" name="name" type="text" value="{{ old('name', Auth::user()->name." ".Auth::user()->lastname) }}"
                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150" readonly/>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="email">
                                    {{ __('Correo') }}
                                </label>
                                <input id="email" name="email" type="email"
                                    value="{{ old('email', Auth::user()->email) }}"
                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150" readonly/>
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-4">
                            <p class="mb-1">Datos Actualizables</p>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="email">
                                    {{ __('Telefono') }}
                                </label>
                                <input id="phone" name="phone" type="phone"
                                    value="{{ old('phone', Auth::user()->phone) }}"
                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required/>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap mt-6">

                        <div class="w-full px-4">
                            <button type="submit"
                                class="w-full bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                                {{ __('Actualizar') }}
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

