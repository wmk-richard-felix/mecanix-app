@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'Busque profissionais de veículos')

@section('content')

    <div class="py-12 home-conteudo">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div>
                            <img src="{{ asset('/img/auto-mecanica.jpg') }}" alt="Centro de serviço" >
                        </div>
                        <div class="flex items-center">
                            <div class="text-desc-cadastro-oficina">
                                <p>Com o Mecanix sua oficina é encontrada!</p>
                                <p>Utilizamos Inteligência Artificial para ajudar nossos usuários a resolverem 
                                    seus problemas automotivos, indicando você especialista!</p>
                                <center>
                                    <a href="{{route('cadastro-oficina')}}">
                                        <button class="btn-primary btn-full btn-cadastrar-oficina">Cadastrar Oficina</button>
                                    </a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex items-center">
                            <div class="text-desc-cadastro-oficina2">
                                <p>Você será avaliado por nossos usuários pelos seus serviços prestados.</p>
                                <p>Quanto melhor classificado mais clientes serão indicados para a sua oficina</p>
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset('/img/avalia.jpg') }}" alt="Especialista">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection