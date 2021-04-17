<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="mb-4 text-center text-lg font-extrabold text-blue-800 mecanix-title">
                {{ __('Esta é uma área segura da aplicação.') }}
                <br>
                {{ __('Por favor, confirme sua senha para continuar.') }}
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4 jetstream-btn">
                    {{ __('Confirmar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
