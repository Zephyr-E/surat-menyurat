<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ url('templates/backend') }}/img/tapin.png" alt="navbar brand" class="navbar-brand img-fluid mx-auto" width="150">
            <h1 class="text-center font-semibold text-xl text-gray-800 leading-tight mt-5">
                E-KETAPANG
            </h1>
            <h3 class="text-center font-semibold text-gray-800 leading-tight">
                DINAS KETAHANAN PANGAN KABUPATEN TAPIN
            </h3>
            {{--
            <x-jet-authentication-card-logo /> --}}
        </x-slot>


        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username"
                    :value="old('username')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-jet-button class="ml-4">
                    {{ __('Masuk') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>