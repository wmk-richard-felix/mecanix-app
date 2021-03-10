<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight header-mecanix">
            {{ __('Cadastro de Oficina') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            {{-- <div wire:id="rOfPWL0Mm2g4yklEUeRs" class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium text-gray-900">Informações cadastrais</h3>
            
                    <p class="mt-1 text-sm text-gray-600">
                        Atualize as informações da sua empresa.
                    </p>
                </div>
            </div> --}}

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form class="dropzone" id="meuPrimeiroDropzone">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <h1 class="h1-form-cadastro">Informações Cadastrais</h1>
                        <div class="grid grid-cols-3 gap-6">
                            <div class="md:col-span-1">
                                <!-- Logo -->
                                <label class="block font-medium text-sm text-gray-700" for="cnpj">
                                    Logo
                                </label>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="logo" id="logo"/>
                            </div>
                            <div class="md:col-span-2">
                                <div class="grid grid-cols-6 gap-6">
                                    <!-- CNPJ -->
                                    <div class="col-span-2 sm:col-span-2">
                                        <label class="block font-medium text-sm text-gray-700" for="cnpj">
                                            CNPJ
                                        </label>
                                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="cnpj" type="text" placeholder="00.000.000/0000-00">
                                    </div>
                
                                    <!-- Razão Social -->
                                    <div class="col-span-4 sm:col-span-4">
                                        <label class="block font-medium text-sm text-gray-700" for="razao_social">
                                            Razão Social
                                        </label>
                                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="razao_social" type="text">
                                    </div>

                                    <!-- Nome Fantasia -->
                                    <div class="col-span-3 sm:col-span-6">
                                        <label class="block font-medium text-sm text-gray-700" for="nome_fantasia">
                                            Nome Fantasia
                                        </label>
                                        <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="nome_fantasia" type="text">
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
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="cep" name="cep" type="text" placeholder="00000-000">
                            </div>
        
                            <!-- Endereço -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="endereco">
                                    Endereço
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="endereco" name="endereco" type="text">
                            </div>

                            <!-- Número -->
                            <div class="col-span-6 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="numero">
                                    Número
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="numero" name="numero" type="text">
                            </div>

                            <!-- Complemento -->
                            <div class="col-span-6 sm:col-span-5">
                                <label class="block font-medium text-sm text-gray-700" for="complemento">
                                    Complemento
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="complemento" name="complemento" type="text">
                            </div>
        
                            <!-- Bairro -->
                            <div class="col-span-6 sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="bairro">
                                    Bairro
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="bairro" name="bairro" type="text">
                            </div>

                            <!-- Cidade -->
                            <div class="col-span-6 sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="cidade">
                                    Cidade
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="cidade" name="cidade" type="text">
                            </div>

                            <!-- UF -->
                            <div class="col-span-6 sm:col-span-1">
                                <label class="block font-medium text-sm text-gray-700" for="uf">
                                    UF
                                </label>
                                <select name="uf" id="uf" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
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
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" type="text" data-mask="(00) 00000-0000" maxlength="15">
                            </div>
        
                            <!-- Email -->
                            <div class="col-span-6 sm:col-span-4">
                                <label class="block font-medium text-sm text-gray-700" for="email_contato">
                                    E-mail para contato
                                </label>
                                <input class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" id="email_contato" name="email_contato" type="email">
                            </div>
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
    document.getElementById('cnpj').addEventListener('input', function (e) {
      var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
      e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
    });
    
    function mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    function mtel(v){
        v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    function id( el ){
        return document.getElementById( el );
    }
    window.onload = function(){
        id('telefone').onkeyup = function(){
            mascara( this, mtel );
        }
    }
</script>