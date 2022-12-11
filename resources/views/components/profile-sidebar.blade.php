@php
#Obtenemos el nombre de la ruta concurrente
$current_route = Route::current()->getName();

#Obtebenos la clase sin los estilos que indica que esta seleccionado
$class = 'transition-all hover:font-bold hover:text-blue-600 px-4 py-3 border-l-2 border-blue-100 hover:border-primary  font-hk text-grey-darkest';
#Obtebenos la clase con los estilos que indica que esta seleccionado
$classprimary = 'transition-all  hover:font-bold hover:text-blue-600 px-4 py-3 border-l-2 border-primary-lighter hover:border-primary  font-hk font-bold text-blue-500 border-primary';
@endphp

<a href="{{$href}}"
class="{{ ($current_route == $url || $current_route == $url2)  ? $classprimary : $class }}">{{ __($name) }}</a>
