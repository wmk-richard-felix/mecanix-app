<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Avaliar atendimento') }}
        </h2>
    </x-slot>

    <div class="mt-2 md:mt-0 md:col-span-2">
        <div class="grid grid-cols-4">
            <div class="col-span-1 sm:col-span-4 md:col-span-1 lg:col-span-1 ml-3">
                <img src="{{ asset('img/logotipos/'.$oficina->logo) }}" alt="Logo {{$oficina->nome_fantasia}}" width="300" class="logo-pag-oficina">
            </div>
            <div class="col-span-3 sm:col-span-4 md:col-span-3 lg:col-span-3">
                <div class="bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3 box-pag-oficina">
                    <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1 ml-3">
                        <div class="grid grid-cols-1">
                            <div class="col-span-1 sm:col-span-2 md:col-span-1 lg:col-span-1 ml-3">
                                <h1 class="titulo-oficina">{{ $oficina->nome_fantasia }}</h1>
                                <p class="texto_criado_em"><b>Atendimento solicitado em</b> {{$criado_em}}</p>
                                <p class="texto_criado_em"><b>Atendimento realizado em</b> {{$realizado_em}}</p>
                                <p class="titulo-paginas">Categoria do atendimento</p>
                                <p class="desc-pag-oficina">{{ $categoria }}</p>
                                
                                <p class="titulo-paginas">Avalie seu atendimento</p>
                                
                                <div class="stars-avalia">
                                    <a href="javascript:void(0)" class="star-avalia" onclick="Avaliar(1)">
                                    <img src="/img/star0.png" id="s1"></a>
                                    
                                    <a href="javascript:void(0)" class="star-avalia" onclick="Avaliar(2)">
                                    <img src="/img/star0.png" id="s2"></a>
                                    
                                    <a href="javascript:void(0)" class="star-avalia" onclick="Avaliar(3)">
                                    <img src="/img/star0.png" id="s3"></a>
                                    
                                    <a href="javascript:void(0)" class="star-avalia" onclick="Avaliar(4)">
                                    <img src="/img/star0.png" id="s4"></a>
                                    
                                    <a href="javascript:void(0)" class="star-avalia" onclick="Avaliar(5)">
                                    <img src="/img/star0.png" id="s5"></a>
                                </div>
                                <form action="{{ route('avaliar') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="rating" name="rating" value="0">
                                    <input type="hidden" id="id" name="id" value="{{$id}}">
                                    <p class="titulo-paginas">Comente seu atendimento</p>
                                    <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block" name="comentario" id="comentario" cols="60" rows="10"></textarea>
                                    <input type="submit" class="btn-primary btn-full secondary-action-btn btn-avaliar" value="Avaliar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>