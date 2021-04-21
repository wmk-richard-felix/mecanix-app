<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Avaliação realizada') }}
        </h2>
    </x-slot>

    
    <a href="{{route('dashboard')}}"><button class="btn-primary btn-full secondary-action-btn btn-avaliado">Voltar aos atendimentos</button></a>
    <script>
        Swal.fire(
            'Obrigado!',
            'Sua avaliação foi enviada com sucesso! Obrigado por utilizar o Mecanix.',
            'success'
        )
    </script>
</x-app-layout>