@extends('layouts.app')
@section('content')
    <!--Start Main Image -->
    @include('layouts.parts.mainimage', [
        'title' => 'Hola, ' . Auth::user()->name,
        'category' => 'Inicio',
        'url' => '/',
    ])
    <!--End  Main Image -->
    <div class="container border-t border-grey-dark px-4 mx-auto">
        <div class="flex flex-col justify-between pt-10 pb-16 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">
            {{-- Start Sidebar --}}
            @include('account.layouts.sidebar')
            {{-- End Sidebar --}}
              {{-- Start Shopping Details --}}
              @include('account.layouts.history_details')
               {{-- End Shopping Details --}}
        </div>
    </div>
@endsection
