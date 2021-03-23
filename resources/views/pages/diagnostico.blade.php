@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'Busque profissionais de veículos')

@section('content')

    <div class="py-12 diagnostico-conteudo">
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

                

            </div>
        </div>
    </div>
@endsection