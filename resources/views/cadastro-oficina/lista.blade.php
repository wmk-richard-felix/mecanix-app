<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Suas oficinas cadastradas') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
            <a href="{{ route('cadastro-oficina') }}">
                <button class="btn-primary btn-full btn-lista-oficinas-cadastrar">Cadastrar nova oficina</button>
            </a>
            <div class="mt-5 md:mt-0 md:col-span-2">
                @foreach ($oficinas as $oficina)
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md mb-3">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-1 sm:col-span-1">
                                <img src="{{ asset('img/logotipos/'.$oficina->logo) }}" alt="Logo">
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <p class="lista-oficinas-titulo">{{ $oficina->nome_fantasia }}</p>
                                <p class="lista-oficinas-conteudo">{{ $oficina->endereco .', '. $oficina->numero .', ' . $oficina->complemento .', ' . $oficina->bairro .', '. $oficina->cidade .' - '. $oficina->uf  }}</p>
                                <p class="lista-oficinas-conteudo">{{ $oficina->telefone }}</p>
                                <p class="lista-oficinas-conteudo">{{ $oficina->email_contato }}</p>
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <a href="{{ url('editar-oficina/'.$oficina->id) }}">
                                    <button class="btn-primary btn-full btn-lista-oficinas-editar">Editar sua Oficina</button>
                                </a>
                                <a href="#">
                                    <button class="btn-primary btn-full btn-lista-oficinas-excluir">Solicitar Exclusão</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

@if(isset($_GET['saved']) != null)
    <script>
        Swal.fire(
            'Salvo!',
            'Sua oficina foi salva!',
            'success'
        )
    </script>
@elseif(isset($_GET['deleted']) != null)
    <script>
        Swal.fire(
            'Excluído!',
            'Registro excluído com sucesso!',
            'success'
        )
    </script>
@endif