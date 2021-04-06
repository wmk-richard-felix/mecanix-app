<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Refinar busca') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8 col-span-3 sm:col-span-4">
            <form action="{{ route('filtro-busca') }}" method="post">
                <div class="mt-2 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1">
                            <div class="px-4 py-3 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3 ml-2 mr-2">
                                @csrf
                                <p class="desc-fil-busca">Estado</p>
                                @foreach ($estados as $estado)
                                <div class="check-busca">
                                    <input type="checkbox" name="estados[]" id="{{ $estado->uf }}" value="{{ $estado->uf }}" class="custom-control-input pos-inh">
                                    <label for="{{ $estado->uf }}" class="custom-control-label pos-inh item-fil-busca">{{ $estado->uf }}</label>
                                </div>                                
                                @endforeach
                                <br>
                                <p class="desc-fil-busca">Cidade</p>
                                @foreach ($cidades as $cidade)
                                <div class="check-busca">
                                    <input type="checkbox" name="cidades[]" id="{{ $cidade->cidade }}" value="{{ $cidade->cidade }}" class="custom-control-input pos-inh">
                                    <label for="{{ $cidade->cidade }}" class="custom-control-label pos-inh item-fil-busca">{{ $cidade->cidade }}</label>
                                </div>                                
                                @endforeach
                                <br>
                                <p class="desc-fil-busca">Categoria</p>
                                @foreach ($todas_categorias as $categoria)
                                <div class="check-busca">
                                    <input type="checkbox" name="categorias[]" id="{{$categoria->descricao}}" value="{{$categoria->id}}" class="custom-control-input pos-inh">
                                    <label for="{{$categoria->descricao}}" class="custom-control-label pos-inh item-fil-busca">{{$categoria->descricao}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn-refinar-busca">
                    <input type="submit" class="btn-primary btn-full secondary-action-btn btn-refinar-busca-1" value="Refinar Busca">
                </div>

        </form>
        </div>
    </div>
</x-app-layout>