<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Meus atendimentos') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8 col-span-3 sm:col-span-4">
            <div class="mt-2 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3" style="margin:auto">
                        @if(count($atendimentos) > 0)
                            <p class="mb-6">Seus atendimentos como cliente</p>
                            @foreach ($atendimentos as $atendimento)
                            <a href="{{ url('/agendamento').'/'.($cryptKey * $atendimento->id) }}">
                                <div class="bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3 card-atendimento">
                                    <div class="grid grid-cols-4">
                                        <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1">
                                            <img src="{{ asset('img/logotipos/'.$atendimento->logo) }}" alt="Logo {{$atendimento->nome_fantasia}}" width="200" class="logo-retorno-busca">
                                        </div>
                                        <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3 box-especialista">
                                            <p class="nome-ret-busca">{{ $atendimento->nome_fantasia }}</p>
                                            <p class="desc-ret-busca">{{ $atendimento->cidade .' - '. $atendimento->uf }}</p>
                                            <p class="mt-6" style="text-align: center">Status do Atendimento:</p>
                                            @if($atendimento->status == 1)
                                                <p class="status1 mt-6">Aguardando retorno da oficina</p>
                                            @elseif($atendimento->status == 2)
                                                <p class="status2 mt-6">Aguardando aceite do cliente</p>
                                            @elseif($atendimento->status == 3)
                                                <p class="status3 mt-6">Agendamento realizado</p>
                                            @elseif($atendimento->status == 4)
                                                <p class="status4 mt-6">Atendimento cancelado</p>
                                            @else
                                                <p class="status5 mt-6">Atendimento realizado</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @endif
                        @if(count($atendimentosOficina) > 0)
                            <p class="mb-6">Seus atendimentos como oficina</p>
                            @foreach ($atendimentosOficina as $atendimento)
                            <a href="{{ url('/agendamento').'/'.($cryptKey * $atendimento->id) }}">
                                <div class="bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3 card-atendimento">
                                    <div class="grid grid-cols-4">
                                        <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1">
                                            <img src="{{ asset('img/logotipos/'.$atendimento->logo) }}" alt="Logo {{$atendimento->nome_fantasia}}" width="200" class="logo-retorno-busca">
                                        </div>
                                        <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3 box-especialista">
                                            <p class="nome-ret-busca">{{ $atendimento->nome_fantasia }}</p>
                                            <p class="desc-ret-busca">{{ $atendimento->cidade .' - '. $atendimento->uf }}</p>
                                            @if($atendimento->status == 1)
                                                <p class="status1 mt-6">Aguardando retorno da oficina</p>
                                            @elseif($atendimento->status == 2)
                                                <p class="status2 mt-6">Aguardando aceite do cliente</p>
                                            @elseif($atendimento->status == 3)
                                                <p class="status3 mt-6">Agendamento realizado</p>
                                            @elseif($atendimento->status == 4)
                                                <p class="status4 mt-6">Atendimento cancelado</p>
                                            @else
                                                <p class="status5 mt-6">Atendimento realizado</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1" style="margin:auto">
                        <a href="{{url('diagnostico')}}">
                            <img src="{{asset('/img/assistente.jpg')}}" class="prop1" alt="Diagnostico">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>