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
                            <a href="{{ url('oficinas/'.$id.'/agendamento') }}">
                                <button class="btn-primary btn-full secondary-action-btn btn-agendar-atendimento"><i class="far fa-calendar-plus"></i> Agendar Atendimento</button>
                            </a>
                            <p class="contato-oficina">Categorias que atendemos</p>
                            <ul>
                                @foreach ($categorias as $categoria)
                                    <li>{{ $categoria->descricao }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1">
                            @if ($avaliado)
                                <p class="sobre-oficina">Avaliação Média</p>
                                <button type="button" class="mb-8" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <span class="avaliacao-oficina-star">
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span class="avaliacao-oficina">
                                        {{$media}}
                                    </span>
                                </button>
                            @endif
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Avaliações da oficina</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($avaliacoes as $avaliacao)
                    <p class="avaliacao-nome">{{$avaliacao->name}}</p>
                    <p>{{date('d/m/Y', strtotime($avaliacao->created_at))}}</p>
                    <p class="stars-avalia avaliacao-star">{{floatval($avaliacao->estrelas)}} 
                        @for ($i = 0; $i < $avaliacao->estrelas; $i++)
                            <img style="margin-left: 5%;" src="/img/star1.png">
                        @endfor
                        @for ($i = 0; $i < (5 - $avaliacao->estrelas); $i++)
                            <img style="margin-left: 5%;" src="/img/star0.png">
                        @endfor
                    </p>
                    <p class="mt-3 avaliacao-comentario">"{{$avaliacao->comentario}}"</p>
                    <br>
                    <hr>
                    <br>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</x-app-layout>