<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Retorno da busca') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @if(count($oficinas) > 0)
                @foreach ($oficinas as $oficina)
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3">
                        <div class="grid grid-cols-6 gap-6">
                            {{ $oficina->nome_fantasia }}
                        </div>
                    </div>
                @endforeach
                @else
                <h1>Nenhuma oficina foi encontrada</h1>
                <a href="{{ url('/') }}">
                    <button class="btn-primary btn-full btn-busca-oficinas">Voltar ao início</button>
                </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

@if(isset($_GET['saved']) != null)
    <script>
        Swal.fire(
            'Salvo!',
            'Sua oficina foi salva!',
            'success'
        )
    </script>
@elseif(isset($_GET['deleted']) != null)
    <script>
        Swal.fire(
            'Excluído!',
            'Registro excluído com sucesso!',
            'success'
        )
    </script>
@endif