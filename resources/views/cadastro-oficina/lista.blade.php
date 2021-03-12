<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Suas oficinas cadastradas') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
            <a href="{{ route('cadastro-oficina') }}">
                <button class="btn-primary btn-full btn-lista-oficinas-cadastrar">Cadastrar nova</button>
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

<script>    
    function mascaratel(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,"");
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('telefone').onkeyup = function(){
            mascaratel( this, mtel );
        }
    }

    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i)
        if (texto.substring(0,1) != saida){
            t.value += texto.substring(0,1);
        }
    }
</script>