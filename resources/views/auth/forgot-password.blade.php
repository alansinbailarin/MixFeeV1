<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img class="w-20 h-20" src="{{ url('img/logomixfee.png') }}" />
        </x-slot>


        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? no hay probela!') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Correo electrónico') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="bg-violet-700 baseline hover:bg-violet-500 baseline ease-out duration-500">
                    {{ __('Reiniciar contraseña') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
