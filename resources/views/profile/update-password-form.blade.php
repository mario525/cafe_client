<div class="flex flex-wrap w-full">
    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6  rounded-lg bg-slate-100 border-2">
            <div class="rounded-t bg-white mb-0 px-6 py-6">
                <div class="text-center flex justify-between">
                    <h6 class="text-slate-700 text-xl font-bold">
                        {{ __('Actualizar Contraseña') }}
                    </h6>
                </div>
            </div>

            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form method="POST" action="{{ route('actualizar.pass') }}" enctype="multipart/form-data"
                    autocomplete="off"  onsubmit="return(validate());">
                    @csrf
                    @method('POST')
                    <div class="flex flex-wrap mt-6">
                        <div class="w-full px-4">

                        </div>
                        <div class="w-full px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-slate-600 text-xs font-bold mb-2"
                                    htmlFor="current_password">
                                    {{ __('Contraseña Actual') }}
                                </label>
                                <input id="current_password" name="current_password" type="password"
                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="************************" required />
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-slate-600 text-xs font-bold mb-2" htmlFor="password">
                                    {{ __('Nueva Contraseña') }}
                                </label>
                                <input id="password" name="password" type="password"
                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="************************" required />
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-slate-600 text-xs font-bold mb-2"
                                    htmlFor="password_confirmation">
                                    {{ __('Confirmar Contraseña') }}
                                </label>
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="border-0 px-3 py-3 placeholder-slate-300 text-slate-600 bg-white rounded text-sm  focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                    placeholder="************************" required />
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
<script>
     /* Validar contraseña */
     function validate() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            if (password != confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Las dos contraseñas deben ser iguales!'
                })
                return false;
            }
            return true;
        }
</script>
