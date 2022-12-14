@extends('layouts.app')
@section('content')
    <!--Start Main Image -->
    @include('layouts.parts.mainimage', [
        'title' => 'Perfil de Usuario',
        'category' => 'Inicio',
        'url' => '/',
    ])
    <!--End  Main Image -->
    <div class="container border-t border-grey-dark px-4 mx-auto">
        <div class="flex flex-col justify-between pt-10 pb-16 sm:pt-12 sm:pb-20 lg:flex-row lg:pb-24">
            {{-- Start Sidebar --}}
            @include('account.layouts.sidebar')
            {{-- End Sidebar --}}

            <div class="flex flex-wrap">

                 {{-- Start Profile Details --}}
                 @include('profile.update-profile-information-form')
                 {{-- End Profile Details --}}

              {{-- Start Update Password --}}
              @include('profile.update-password-form')
               {{-- End SUpdate Password --}}

            </div>

        </div>
    </div>
@endsection

