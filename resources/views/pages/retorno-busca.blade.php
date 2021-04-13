<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Retorno da busca') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8 col-span-3 sm:col-span-4">
            <div class="oficinas-encontradas">
                @if(count($oficinas)>1)
                    Foram encontradas {{ count($oficinas) }} oficinas na sua busca
                @elseif(count($oficinas)==0)
                    @if(count($cat_sels))
                        Não foi encontrada nenhuma oficina na sua busca
                    @else
                        Selecione pelo menos uma categoria
                        <script>
                            Swal.fire(
                                'Selecione ao menos uma categoria',
                                'Para realizar a sua busca',
                                'info'
                            )
                        </script>
                    @endif
                @else
                Foi encontrada {{ count($oficinas) }} oficina na sua busca
                @endif
            </div>
            <div class="btn-refinar-busca">
                <a href="{{route('refinar-busca')}}"><button class="btn-primary btn-full secondary-action-btn btn-refinar-busca-1">Refinar busca</button></a>
            </div>
            <div class="mt-2 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1 filtro-busca">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3">
                            <form action="{{ route('filtro-busca') }}" method="post">
                                @csrf
                                <p class="tit-ret-busca">Refine sua busca</p>
                                <p class="desc-ret-busca">Estado</p>
                                @foreach ($estados as $estado)
                                <div class="check-busca">
                                    <input type="checkbox" name="estados[]" id="{{ $estado->uf }}" value="{{ $estado->uf }}" class="custom-control-input pos-inh" @if(in_array($estado->uf, $estados_sels)) checked @endif>
                                    <label for="{{ $estado->uf }}" class="custom-control-label pos-inh">{{ $estado->uf }}</label>
                                </div>                                
                                @endforeach
                                <br>
                                <p class="desc-ret-busca">Cidade</p>
                                @foreach ($cidades as $cidade)
                                <div class="check-busca">
                                    <input type="checkbox" name="cidades[]" id="{{ $cidade->cidade }}" value="{{ $cidade->cidade }}" class="custom-control-input pos-inh" @if(in_array($cidade->cidade, $cidades_sels)) checked @endif>
                                    <label for="{{ $cidade->cidade }}" class="custom-control-label pos-inh">{{ $cidade->cidade }}</label>
                                </div>                                
                                @endforeach
                                <br>
                                <p class="desc-ret-busca">Categoria</p>
                                @foreach ($todas_categorias as $categoria)
                                <div class="check-busca">
                                    <input type="checkbox" name="categorias[]" id="{{$categoria->descricao}}" value="{{$categoria->id}}" class="custom-control-input pos-inh" @if(in_array($categoria->id, $cat_sels)) checked @endif>
                                    <label for="{{$categoria->descricao}}" class="custom-control-label pos-inh">{{$categoria->descricao}}</label>
                                </div>
                                @endforeach
                                <input type="submit" class="btn-primary btn-full secondary-action-btn busca-filtrar" value="Filtrar">
                            </form>
                        </div>
                    </div>
                    <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3">
                        @if(count($oficinas) > 0)
                        @foreach ($oficinas as $oficina)
                        <a href="{{ url('/oficinas').'/'.($cryptKey * $oficina->id) }}">
                            <div class="bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3 card-oficina">
                                <div class="grid grid-cols-4">
                                    <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1">
                                        <img src="{{ asset('img/logotipos/'.$oficina->logo) }}" alt="Logo {{$oficina->nome_fantasia}}" width="200" class="logo-retorno-busca">
                                    </div>
                                    <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3 box-especialista">
                                        <p class="nome-ret-busca">{{ $oficina->nome_fantasia }}</p>
                                        <p class="desc-ret-busca">{{ $oficina->cidade .' - '. $oficina->uf }}</p>
                                        <ul>
                                            @foreach ($categorias as $categoria)
                                            @if($categoria->codigo_oficina == $oficina->id)
                                                <li>{{ $categoria->descricao }}</li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @else
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