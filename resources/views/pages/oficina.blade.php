<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Conhecer oficina') }}
        </h2>
    </x-slot>

    <div class="mt-2 md:mt-0 md:col-span-2">
        <div class="grid grid-cols-4">
            <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1 ml-3">
                <img src="{{ asset('img/logotipos/'.$oficina->logo) }}" alt="Logo {{$oficina->nome_fantasia}}" width="300" class="logo-pag-oficina">
            </div>
            <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3">
                <div class="bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3 box-pag-oficina">
                    <div class="grid grid-cols-2">
                        <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1 ml-3">
                            <h1 class="titulo-oficina">{{ $oficina->nome_fantasia }}</h1>
                            <p class="desc-pag-oficina">{{ $oficina->endereco.', '.$oficina->numero.' '.$oficina->complemento }}</p>
                            <p class="desc-pag-oficina">{{ $oficina->bairro.', '.$oficina->cidade.' - '.$oficina->uf }}</p>
                            <p class="contato-oficina">Entre em contato</p>
                            <p class="desc-pag-oficina">Telefone: {{ $oficina->telefone }}</p>
                            <p class="desc-pag-oficina">E-mail: {{ $oficina->email_contato }}</p>
                            <button class="btn-primary btn-full secondary-action-btn btn-agendar-atendimento"><i class="far fa-calendar-plus"></i> Agendar Atendimento</button>
                            <p class="contato-oficina">Categorias que atendemos</p>
                            <ul>
                                @foreach ($categorias as $categoria)
                                    <li>{{ $categoria->descricao }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1">
                            <p class="sobre-oficina">Sobre nós</p>
                            <div class="info-oficina">
                                {!! str_replace("\n", "<br>", $oficina->info) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>