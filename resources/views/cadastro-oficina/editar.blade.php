<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Editando sua oficina') }}
        </h2>
    </x-slot>
    
    <div>
        <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ action("App\Http\Controllers\OficinaController@update") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="token_id" value="{{$oficina->id}}">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <h1 class="h1-form-cadastro">Informações Cadastrais</h1>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="md:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="cnpj">
                                    Logo
                                </label>
                                <img src="{{asset('img/logotipos/'.$oficina->logo)}}" alt="">
                            </div>
                            <div class="md:col-span-1">
                                <!-- Logo -->
                                <label class="block font-medium text-sm text-gray-700" for="cnpj">
                                    Alterar Logo
                                </label>
                                <input id="logo" name="logo" type="file" class="file" data-browse-on-zone-click="true">
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="md:col-span-2">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- CNPJ -->
                                    <div class="col-span-4 sm:col-span-6 md:col-span-2 lg:col-span-2">
                                        <label class="block font-medium text-sm text-gray-700" for="cnpj">
                                            CNPJ
                                        </label>
                                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="cnpj" id="cnpj" type="text" placeholder="00.000.000/0000-00"  onkeypress="mascara(this, '##.###.###/####-###')" maxlength="18" value="{{$oficina->cnpj}}" >
                                    </div>
                
                                    <!-- Razão Social -->
                                    <div class="col-span-4 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="razao_social">
                                            Razão Social
                                        </label>
                                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="razao_social" id="razao_social" type="text" value="{{$oficina->razao_social}}">
                                    </div>

                                    <!-- Nome Fantasia -->
                                    <div class="col-span-4 sm:col-span-6">
                                        <label class="block font-medium text-sm text-gray-700" for="nome_fantasia">
                                            Nome Fantasia
                                        </label>
                                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="nome_fantasia" id="nome_fantasia" type="text" value="{{$oficina->nome_fantasia}}">
                                    </div>
                                    
                                    <!-- Info -->
                                    <div class="col-span-6 sm:col-span-6">
                                        <label class="block font-medium text-sm text-gray-700" for="nome_fantasia">
                                            Informações da sua oficina
                                        </label>
                                        <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" name="info" id="info" style="height: 170px">{{$oficina->info}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Endereços -->
                        <h1 class="h1-form-cadastro">Endereço</h1>
                        <div class="grid grid-cols-6 gap-6">
                            <!-- CEP -->
                            <div class="col-span-6 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="cep">
                                    CEP
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="cep" name="cep" type="text" placeholder="00000-000" onkeypress="mascara(this, '#####-###')" maxlength="9" value="{{$oficina->cep}}">
                            </div>
        
                            <!-- Endereço -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="endereco">
                                    Endereço
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="endereco" name="endereco" type="text" value="{{$oficina->endereco}}">
                            </div>

                            <!-- Número -->
                            <div class="col-span-6 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="numero">
                                    Número
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="numero" name="numero" type="text" value="{{$oficina->numero}}">
                            </div>

                            <!-- Complemento -->
                            <div class="col-span-6 sm:col-span-5">
                                <label class="block font-medium text-sm text-gray-700" for="complemento">
                                    Complemento
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="complemento" name="complemento" type="text" value="{{$oficina->complemento}}">
                            </div>
        
                            <!-- Bairro -->
                            <div class="col-span-6 sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="bairro">
                                    Bairro
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="bairro" name="bairro" type="text" value="{{$oficina->bairro}}">
                            </div>

                            <!-- Cidade -->
                            <div class="col-span-6 sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="cidade">
                                    Cidade
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="cidade" name="cidade" type="text" value="{{$oficina->cidade}}">
                            </div>

                            <!-- UF -->
                            <div class="col-span-6 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="uf">
                                    UF
                                </label>
                                <select name="uf" id="uf" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" >
                                    <option value="AC" @if($oficina->uf == "AC") selected @endif>Acre</option>
                                    <option value="AL" @if($oficina->uf == "AL") selected @endif>Alagoas</option>
                                    <option value="AP" @if($oficina->uf == "AP") selected @endif>Amapá</option>
                                    <option value="AM" @if($oficina->uf == "AM") selected @endif>Amazonas</option>
                                    <option value="BA" @if($oficina->uf == "BA") selected @endif>Bahia</option>
                                    <option value="CE" @if($oficina->uf == "CE") selected @endif>Ceará</option>
                                    <option value="DF" @if($oficina->uf == "DF") selected @endif>Distrito Federal</option>
                                    <option value="ES" @if($oficina->uf == "ES") selected @endif>Espírito Santo</option>
                                    <option value="GO" @if($oficina->uf == "GO") selected @endif>Goiás</option>
                                    <option value="MA" @if($oficina->uf == "MA") selected @endif>Maranhão</option>
                                    <option value="MT" @if($oficina->uf == "MT") selected @endif>Mato Grosso</option>
                                    <option value="MS" @if($oficina->uf == "MS") selected @endif>Mato Grosso do Sul</option>
                                    <option value="MG" @if($oficina->uf == "MG") selected @endif>Minas Gerais</option>
                                    <option value="PA" @if($oficina->uf == "PA") selected @endif>Pará</option>
                                    <option value="PB" @if($oficina->uf == "PB") selected @endif>Paraíba</option>
                                    <option value="PR" @if($oficina->uf == "PR") selected @endif>Paraná</option>
                                    <option value="PE" @if($oficina->uf == "PE") selected @endif>Pernambuco</option>
                                    <option value="PI" @if($oficina->uf == "PI") selected @endif>Piauí</option>
                                    <option value="RJ" @if($oficina->uf == "RJ") selected @endif>Rio de Janeiro</option>
                                    <option value="RN" @if($oficina->uf == "RN") selected @endif>Rio Grande do Norte</option>
                                    <option value="RS" @if($oficina->uf == "RS") selected @endif>Rio Grande do Sul</option>
                                    <option value="RO" @if($oficina->uf == "RO") selected @endif>Rondônia</option>
                                    <option value="RR" @if($oficina->uf == "RR") selected @endif>Roraima</option>
                                    <option value="SC" @if($oficina->uf == "SC") selected @endif>Santa Catarina</option>
                                    <option value="SP" @if($oficina->uf == "SP") selected @endif>São Paulo</option>
                                    <option value="SE" @if($oficina->uf == "SE") selected @endif>Sergipe</option>
                                    <option value="TO" @if($oficina->uf == "TO") selected @endif>Tocantins</option>
                                </select>
                            </div>
                        </div>

                        <!-- Info de contato -->
                        <h1 class="h1-form-cadastro">Contatos</h1>
                        <div class="grid grid-cols-6 gap-6">
                            <!-- Telefone -->
                            <div class="col-span-6 sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="telefone">
                                    Telefone
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" type="text" maxlength="15" value="{{$oficina->telefone}}">
                            </div>
        
                            <!-- Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="email_contato">
                                    E-mail para contato
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="email_contato" name="email_contato" type="email" value="{{$oficina->email_contato}}">
                            </div>
                        </div>
                        
                        <!-- Categorias -->
                        <h1 class="h1-form-cadastro">Selecione suas categorias</h1>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="arrefecimento" value="1" class="custom-control-input" @if(in_array('1', $categorias)) checked @endif>
                            <label for="arrefecimento" class="custom-control-label">Arrefecimento</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="motor" value="2" class="custom-control-input" @if(in_array('2', $categorias)) checked @endif>
                            <label for="motor" class="custom-control-label">Motor</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="freios" value="3" class="custom-control-input" @if(in_array('3', $categorias)) checked @endif>
                            <label for="freios" class="custom-control-label">Freios</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="escapamentos" value="4" class="custom-control-input" @if(in_array('4', $categorias)) checked @endif>
                            <label for="escapamentos" class="custom-control-label">Escapamentos</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="revisao" value="5" class="custom-control-input" @if(in_array('5', $categorias)) checked @endif>
                            <label for="revisao" class="custom-control-label">Revisão</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="troca_bateria" value="6" class="custom-control-input" @if(in_array('6', $categorias)) checked @endif>
                            <label for="troca_bateria" class="custom-control-label">Troca de Bateria</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="correias" value="7" class="custom-control-input" @if(in_array('7', $categorias)) checked @endif>
                            <label for="correias" class="custom-control-label">Correias</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="funilaria" value="8" class="custom-control-input" @if(in_array('8', $categorias)) checked @endif>
                            <label for="funilaria" class="custom-control-label">Funilaria</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="transmissao" value="9" class="custom-control-input" @if(in_array('9', $categorias)) checked @endif>
                            <label for="transmissao" class="custom-control-label">Transmissão</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="pneus" value="10" class="custom-control-input" @if(in_array('10', $categorias)) checked @endif>
                            <label for="pneus" class="custom-control-label">Pneus</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="suspensao" value="11" class="custom-control-input" @if(in_array('11', $categorias)) checked @endif>
                            <label for="pneus" class="custom-control-label">Suspensão</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="rodas" value="12" class="custom-control-input" @if(in_array('12', $categorias)) checked @endif>
                            <label for="rodas" class="custom-control-label">Rodas</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="radiador" value="13" class="custom-control-input" @if(in_array('13', $categorias)) checked @endif>
                            <label for="radiador" class="custom-control-label">Radiador</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="freio_abs" value="14" class="custom-control-input" @if(in_array('14', $categorias)) checked @endif>
                            <label for="freio_abs" class="custom-control-label">Freios ABS</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="ar_condicionado" value="15" class="custom-control-input" @if(in_array('15', $categorias)) checked @endif>
                            <label for="ar_condicionado" class="custom-control-label">Ar Condicionado</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="injecao" value="16" class="custom-control-input" @if(in_array('16', $categorias)) checked @endif>
                            <label for="injecao" class="custom-control-label">Injeção</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="airbag" value="17" class="custom-control-input" @if(in_array('17', $categorias)) checked @endif>
                            <label for="airbag" class="custom-control-label">Airbag</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" value="18" id="troca_oleo" class="custom-control-input" @if(in_array('18', $categorias)) checked @endif>
                            <label for="troca_oleo" class="custom-control-label">Troca de Óleo</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" value="19" id="chaveiro" class="custom-control-input" @if(in_array('19', $categorias)) checked @endif>
                            <label for="chaveiro" class="custom-control-label">Chaveiro</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="alinhamento_balanceamento" value="20" class="custom-control-input" @if(in_array('20', $categorias)) checked @endif>
                            <label for="alinhamento_balanceamento" class="custom-control-label">Alinhamento e Balanceamento</label>
                        </div>
                        <div class="form-check mb-3 form-check-inline">
                            <input type="checkbox" name="categorias[]" id="direcao" value="21" class="custom-control-input" @if(in_array('21', $categorias)) checked @endif>
                            <label for="direcao" class="custom-control-label">Direção Hidráulica</label>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <div x-data="{ shown: false, timeout: null }" x-init="window.livewire.find('CmJyDepkdeR8wOqr9bNF').on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.opacity.out.duration.1500ms="shown" style="display: none;" class="text-sm text-gray-600 mr-3">
                            Atualizado.
                        </div>
        
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:loading.attr="disabled" wire:target="photo">
                            Salvar
                        </button>
                    </div>
                </form>
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