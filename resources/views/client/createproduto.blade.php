@extends('layouts.adminLayout')

@section('title', 'Adicionar Produto')

@section('content')

    <div class="container mx-auto">
        <h1 class="text-4xl text-center">Adicionar Produto</h1>
        <div class="w-full p-8 mx-auto bg-gray-400 rounded-lg md:w-1/2">
            <form action="{{ route('vinhos') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Tratamento de exceção e exibição de mensagens de erro -->
                @if ($errors->any())
                    <div class="mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-500">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <label for="imagem" class="block mb-2 font-bold text-gray-700">Imagem:</label>
                    <input type="file" id="imagem" name="imagem"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('imagem')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="nome" class="block mb-2 font-bold text-gray-700">Produto:</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome do Produto"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('nome')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tipo_vinho" class="block mb-2 font-bold text-gray-700">Tipo de Vinho:</label>
                    <select name="tipo_vinho" id="tipo_vinho"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="" disabled selected>Selecione o tipo de vinho</option>
                        <option value="0">Arinto</option>
                        <option value="1">Loureiro</option>
                    </select>
                    @error('tipo_vinho')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="preco" class="block mb-2 font-bold text-gray-700">Preço:</label>
                    <input type="number" id="preco" name="preco" placeholder="Preço"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('preco')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="descricao" class="block mb-2 font-bold text-gray-700">Descrição:</label>
                    <input type="text" id="descricao" name="descricao" placeholder="Descrição do produto"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('descricao')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="qnt_stock" class="block mb-2 font-bold text-gray-700">Quantidade em Estoque:</label>
                    <input type="text" id="qnt_stock" name="qnt_stock" placeholder="Quantidade em estoque"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('qnt_stock')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="ispack" class="block mb-2 font-bold text-gray-700">Em Pack:</label>
                    <select name="ispack" id="ispack"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                    @error('ispack')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="ano_colheita" class="block mb-2 font-bold text-gray-700">Ano de Colheita:</label>
                    <input type="number" id="ano_colheita" name="ano_colheita" placeholder="Ano de colheita"
                        class="block w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('ano_colheita')
                        <div class="mt-1 text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="submit"
                        class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        value="Adicionar">
                </div>
            </form>
        </div>
    </div>
@endsection