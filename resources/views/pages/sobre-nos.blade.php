@extends('layouts.master')

@section('title', 'Mecanix')
@section('description', 'Busque profissionais de veículos')

@section('content')

    <div class="py-12 diagnostico-conteudo">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-12 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white my-12 grid grid-cols-1">
                        
                    <div class="text-about-us-main"> 
                        Prazer, somos o Mecanix. 
                    </div>


                    <div class="pt-6 text-about-us">
                        <p>Construído durante a <strong>Especialização em Engenharia de Software (EES) da Universidade Federal de São Carlos (UFSCAR), campus Sorocaba</strong>, nossa aplicação oferece a solução ideal para os problemas de seu veículo.</p>
                    </div>

                    <div class="pt-6 text-about-us">
                        <p>Com uma solução que lida com o problema do seu carro desde o <strong>diagnóstico do problema</strong> de seu veículo, amparados por modelos de Inteligência Artificial robustos, até a <strong>sugestão do profissional</strong> mecânico que mais possui fit para resolver o problema diagnosticado, queremos te oferecer a <strong>melhor experiência do serviço mecânico!</strong> </p> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection