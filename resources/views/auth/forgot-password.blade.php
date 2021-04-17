<x-guest-layout>
    <x-jet-authentication-card>

        <x-slot name="logo">
            <div class="mb-4 text-center text-lg font-extrabold text-blue-800 mecanix-title">
                {{ __('Esqueceu sua senha?') }}
                <br>
                {{ __('Um link para criar uma nova senha será enviado ao email solicitado abaixo.') }}
            </div>
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="jetstream-btn">
                    {{ __('Enviar link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
