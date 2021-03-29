<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Retorno da busca') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8 col-span-3 sm:col-span-4">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3">
                            Filtro
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3">
                        @if(count($oficinas) > 0)
                        @foreach ($oficinas as $oficina)
                        <div class="bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3">
                            <div class="grid grid-cols-4">
                                <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1">
                                    <img src="{{ asset('img/logotipos/'.$oficina->logo) }}" alt="" width="200">
                                </div>
                                <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3">
                                    <p class="nome-ret-busca">{{ $oficina->nome_fantasia }}</p>
                                    <p class="desc-ret-busca">{{ $oficina->cidade .' - '. $oficina->uf }}</p>
                                </div>
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
        </div>
    </div>
</x-app-layout>