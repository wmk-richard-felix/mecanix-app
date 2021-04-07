<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Agendar atendimento') }}
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
                            <p class="contato-oficina">Selecione a categoria para atendimento</p>
                            <select class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" name="categoria" id="categoria">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->descricao }}">{{ $categoria->descricao }}</option>
                                @endforeach
                            </select>
                            <p class="contato-oficina">Relate seu problema para a oficina</p>
                            <textarea class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" name="mensagem" id="mensagem" cols="45" rows="8"></textarea>

                        </div>
                        <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1">
                            <p class="contato-oficina">Selecione a melhor data para atendimento</p>
                            <input class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" style="width: 50%" type="datetime-local" name="data" id="data">
                            <a href="{{ url('oficinas/'.$id.'/agendamento') }}">
                                <center><button class="btn-primary btn-full secondary-action-btn btn-agendar-atendimento"><i class="far fa-calendar-plus"></i> Solicitar Atendimento</button></center>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>