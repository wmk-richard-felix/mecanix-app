@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'Busque profissionais de veículos')

@section('content')

    <div class="py-12 home-conteudo">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 busca-home">
                    <div class="mt-8 text-home1-b">
                        Precisando consertar seu carro?
                    </div>
                    <div class="mt-8 text-home1">
                        Busque o profissional certo para seu problema automotivo
                    </div>

                    <div class="mt-6 text-gray-500  mb-12">
                        <center>
                            <form action="{{ route('busca-home') }}" method="post" class="form-busca-home">
                                @csrf
                                <select required name="categoria" id="categoria" class="form-select busca-home1">
                                    <option value="">Selecione a categoria..</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                                    @endforeach
                                </select>
                                <select required name="uf" id="uf" class="busca-home2">
                                    <option value="">Selecione</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{$estado->uf}}">{{$estado->uf}}</option>
                                    @endforeach
                                </select>
                                <select name="cidade" id="cidade" class="busca-home3">
                                    <option value="">Selecione a cidade</option>
                                    @foreach ($cidades as $cidade)
                                        <option value="{{$cidade->cidade}}">{{$cidade->cidade}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="submit-btn-home btn-primary btn-full">Buscar</button>
                            </form>
                        </center>
                    </div>

                    <div class="text-home1-c">
                        O carro quebrou e não sabe quem procurar?
                    </div>

                    <div class="text-home1-d">
                        <a href="{{ route('diagnostico') }}">Faça um diagnóstico</a>
                    </div>
                </div>

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 my-12">
                    <div class="mt-8 text-home1a">
                        Utilize nosso assitente virtual 🤖 para encontrar o problema do seu veículo
                    </div>

                    <div class="mt-6 text-desc-home-1">
                        Nossa ferramenta de Inteligência Artificial irá ajudar a encontrar o problema do seu veículo
                        e indicar os profissionais que são melhores qualificados para resolver o problema.
                    </div>

                    <center>
                        <a href="{{ url('/diagnostico') }}">
                            <button class="btn-primary btn-full diagnostico-btn-home">Realizar Diagnóstico</button>
                        </a>
                    </center>
                </div>

                <div class="bg-gray-200 bg-opacity-25">
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-12">
                        <h1 class="ml-4 text-lg text-gray-600 leading-7 font-semibold text-home2">Qual especialista deseja encontrar?</h1>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l grid grid-cols-4">
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/mecanico.jpg') }}" alt="Mecânico" width="310" class="img-fluid">
                            <p class="text-category-home">Mecânicos</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/funileiro.jpg') }}" alt="Funileiro" width="310" class="img-fluid">
                            <p class="text-category-home">Funileiros</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/vidraceiro.jpg') }}" alt="Vidraceiro" width="310" class="img-fluid">
                            <p class="text-category-home">Vidraceiros</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/eletrica.jpg') }}" alt="Auto Elétrica" width="310" class="img-fluid">
                            <p class="text-category-home">Auto Elétrico</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="especialista-home">
                            <img src="{{ asset('/img/homem-mecanico.png') }}" alt="Especialista" width="300">
                        </div>
                        <div class="flex items-center">
                            <div class="text-banner text-desc-home-2">
                                <p>Com o Mecanix seu problema é resolvido mais rápido!</p>
                                <p>Busque o profissional mais qualificado para te ajudar com seu problema automotivo.</p>
                                <center>
                                    <a href="#">
                                        <button class="btn-primary btn-full diagnostico-btn-home">Buscar Profissionais</button>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white-200 bg-opacity-25">
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-12">
                        <h1 class="ml-4 text-lg text-gray-600 leading-7 font-semibold text-home2">Especialistas mais recentes</h1>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l grid grid-cols-4">
                        @foreach ($oficinas as $oficina)
                            <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                                <img src="{{ asset('/img/logotipos/'.$oficina->logo) }}" alt="Logotipo" width="310">
                                <p class="text-oficina-nome-home">{{ $oficina->nome_fantasia }}</p>
                                <p class="text-oficina-cidade-home">{{ $oficina->cidade }} - {{ $oficina->uf }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection