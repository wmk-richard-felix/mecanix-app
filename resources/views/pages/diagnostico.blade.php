@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'Busque profissionais de veículos')

@section('content')

    <div class="py-12 home-conteudo">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 my-12 grid grid-cols-2">

                    <div class="mt-6 text-diagnostico">
                        Utilize nosso assitente virtual 🤖 para encontrar o problema do seu veículo
                        <img src="{{ asset('/img/robot.png') }}" alt="">
                    </div>

                    <div class="chatroom">
                        <iframe class="chatbot" src="https://mecanix-chatroom.azurewebsites.net/"></iframe>
                    </div>
                </div>

                <div class="bg-gray-200 bg-opacity-25">
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l col-12">
                        <h1 class="ml-4 text-lg text-gray-600 leading-7 font-semibold text-home2">Qual especialista deseja encontrar?</h1>
                    </div>

                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l grid grid-cols-4">
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/mecanico.jpg') }}" alt="Mecânico" width="310">
                            <p class="text-category-home">Mecânicos</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/funileiro.jpg') }}" alt="Funileiro" width="310">
                            <p class="text-category-home">Funileiros</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/vidraceiro.jpg') }}" alt="Vidraceiro" width="310">
                            <p class="text-category-home">Vidraceiros</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/eletrica.jpg') }}" alt="Auto Elétrica" width="310">
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
                            <div class="text-desc-home-2">
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
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/mecanico.jpg') }}" alt="Mecânico" width="310">
                            <p class="text-category-home">Nome Oficina</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/mecanico.jpg') }}" alt="Mecânico" width="310">
                            <p class="text-category-home">Nome Oficina</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/mecanico.jpg') }}" alt="Mecânico" width="310">
                            <p class="text-category-home">Nome Oficina</p>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 box-category">
                            <img src="{{ asset('/img/mecanico.jpg') }}" alt="Mecânico" width="310">
                            <p class="text-category-home">Nome Oficina</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection