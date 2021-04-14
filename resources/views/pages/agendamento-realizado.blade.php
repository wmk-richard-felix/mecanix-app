<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Agendamento realizado') }}
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
                            @if($oficinaEditando)
                                <h1 class="titulo-oficina">{{ $usuario->name }}</h1>
                                <p class="texto_criado_em">Atendimento solicitado em {{$criado_em}}</p>
                            @else
                                <h1 class="titulo-oficina">{{ $oficina->nome_fantasia }}</h1>
                                <p class="texto_criado_em">Atendimento solicitado em {{$criado_em}}</p>
                                <p class="desc-pag-oficina">{{ $oficina->endereco.', '.$oficina->numero.' '.$oficina->complemento }}</p>
                                <p class="desc-pag-oficina">{{ $oficina->bairro.', '.$oficina->cidade.' - '.$oficina->uf }}</p>
                            @endif
                            <p class="contato-oficina">Categoria do atendimento</p>
                            <p class="desc-pag-oficina">{{ $categoria }}</p>
                            <p class="contato-oficina">Problema relatado</p>
                            <textarea class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" name="relato" id="relato" cols="45" rows="8" readonly>{{ $relato }}</textarea>

                        </div>
                        <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1 ml-4">
                            <p class="contato-oficina">Data sugerida para atendimento</p>
                            <p class="desc-pag-oficina">{{ $data_sugerida }}</p>
                            <p class="contato-oficina">Status do Atendimento</p>
                            <p class="desc-pag-oficina {{'status'.$statusCod}}">{{ $status }}</p>
                            @if($statusCod == 5)
                                <p class="contato-oficina">Atendimento realizado em</p>
                                <p class="desc-pag-oficina">{{ $data_realizado }}</p>
                                <br>
                                <a href="{{ url('avaliar-atendimento/'.$idToken) }}">
                                    <button class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block avaliar-atendimento">Avaliar Atendimento</button>
                                </a>
                            @endif
                            @if($oficinaEditando)
                                @if($statusCod == 1)
                                    <p class="contato-oficina">Confirme ou indique uma nova data para atendimento</p>
                                    <form method="POST" action="{{ route('atualizar-data') }}" >
                                        @csrf
                                        <input type="hidden" name="atendimento" id="atendimento" value="{{$id}}">
                                        <input type="hidden" name="novo_status" id="novo_status" value="2">
                                        <input class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" style="width: 50%" type="datetime-local" name="data_sugerida" id="data_sugerida" value="{{$data_sugerida_orig}}">
                                        <input type="submit" class="btn-primary btn-full secondary-action-btn btn-agendar-atendimento" value="Indicar Data">
                                    </form>
                                @elseif($statusCod == 3)
                                    <p class="contato-oficina">Confirme a data que foi realizado o atendimento</p>
                                    <form method="POST" action="{{ route('atualizar-data') }}" >
                                        @csrf
                                        <input type="hidden" name="atendimento" id="atendimento" value="{{$id}}">
                                        <input type="hidden" name="novo_status" id="novo_status" value="5">
                                        <input class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" style="width: 50%" type="datetime-local" name="data_sugerida" id="data_sugerida">
                                        <input type="submit" class="btn-primary btn-full secondary-action-btn btn-agendar-atendimento" value="Indicar Data">
                                    </form>
                                @endif
                            @elseif($usuarioEditando)
                                @if($statusCod == 2)
                                    <p class="contato-oficina">Confirme ou indique uma nova data para atendimento</p>
                                    <form method="POST" action="{{ route('atualizar-data') }}" >
                                        @csrf
                                        <input type="hidden" name="atendimento" id="atendimento" value="{{$id}}">
                                        <input type="hidden" name="novo_status" id="novo_status" value="1">
                                        <input class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" style="width: 50%" type="datetime-local" name="data_sugerida" id="data_sugerida" value="{{$data_sugerida_orig}}">
                                        <input type="submit" class="btn-primary btn-full secondary-action-btn btn-agendar-atendimento" value="Indicar Data">
                                    </form>
                                @endif
                                @if($statusCod <> 4 and $statusCod <> 5)
                                    <br>
                                    <a href="{{ url('cancelar-atendimento/'.$idToken) }}">
                                        <button class="form-control border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block cancelar-atendimento">Cancelar Atendimento</button>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>