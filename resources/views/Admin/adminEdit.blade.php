@extends('layouts.adminLayout')

@section('title', 'Página Administrativa')

@section('content')

    <div class="container mx-auto mt-8">
        <a href="/admin/home"
            class="w-full col-span-2 px-4 py-2 mt-4 text-white bg-gray-500 rounded-md lg:col-span-3 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Voltar
        </a>
        <h1 class="mb-8 text-3xl font-bold text-center">Editar {{ $produto->nome }}</h1>
        <form action="/admin/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data"
            class="grid grid-cols-1 gap-6 p-8 mx-auto bg-white rounded-lg shadow-md md:grid-cols-2 lg:grid-cols-3 max-w-7xl">
            @csrf
            @method('PUT')
            <div class="mb-6 col-span-full">
                <label for="imagem" class="block mb-2 text-sm font-semibold">Imagem do {{ $produto->nome }}</label>
                <div class="relative">
                    <img src="{{ asset('img/games/' . $produto->imagem) }}" alt="{{ $produto->nome }}"
                        class="w-full mt-2 rounded-lg shadow-md">
                    <label for="nova_imagem"
                        class="absolute bottom-0 left-0 w-full px-4 py-2 text-sm font-semibold leading-none text-white transition-opacity bg-blue-500 opacity-0 cursor-pointer select-none rounded-b-md hover:opacity-100">
                        Escolher nova imagem
                        <input type="file" id="nova_imagem" name="nova_imagem" class="hidden">
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <label for="nome" class="block mb-2 text-sm font-semibold">Nome:</label>
                <input type="text" class="w-full px-3 py-2 text-sm border rounded-md" id="nome" name="nome"
                    placeholder="Nome..." value="{{ $produto->nome }}">
            </div>

            <div class="mb-6">
                <label for="tipo_vinho" class="block mb-2 text-sm font-semibold">Tipo do vinho:</label>
                <select name="tipo_vinho" id="tipo_vinho" class="w-full px-3 py-2 text-sm border rounded-md">
                    <option value="" disabled selected>Selecione o tipo do vinho</option>
                    <option value="0">Arinto</option>
                    <option value="1" {{ $produto->tipo_vinho == 1 ? "selected='selected'" : '' }}>Loureiro</option>
                </select>
            </div>


            <div class="mb-6">
                <label for="preco" class="block mb-2 text-sm font-semibold">Preço:</label>
                <input type="number" class="w-full px-3 py-2 text-sm border rounded-md" id="preco" name="preco"
                    placeholder="Preço..." value="{{ $produto->preco }}">
            </div>

            <div class="mb-6">
                <label for="descricao" class="block mb-2 text-sm font-semibold">Descrição:</label>
                <textarea name="descricao" id="descricao" class="w-full px-3 py-2 text-sm border rounded-md" placeholder="Descrição...">{{ $produto->descricao }}</textarea>
            </div>

            <div class="mb-6">
                <label for="qnt_stock" class="block mb-2 text-sm font-semibold">Quantidade em stock:</label>
                <input type="number" class="w-full px-3 py-2 text-sm border rounded-md" id="qnt_stock" name="qnt_stock"
                    placeholder="Quantidade..." value="{{ $produto->qnt_stock }}">
            </div>

            <div class="mb-6">
                <label for="ispack" class="block mb-2 text-sm font-semibold">É em pack?</label>
                <select name="ispack" id="ispack" class="w-full px-3 py-2 text-sm border rounded-md">
                    <option value="0">Não</option>
                    <option value="1" {{ $produto->ispack == 1 ? "selected='selected'" : '' }}>Sim</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="ano_colheita" class="block mb-2 text-sm font-semibold">Ano de colheita:</label>
                <input type="number" class="w-full px-3 py-2 text-sm border rounded-md" id="ano_colheita"
                    name="ano_colheita" placeholder="Ano..." value="{{ $produto->ano_colheita }}">
                @error('ano_colheita')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full col-span-2 px-4 py-2 text-white bg-blue-500 rounded-md lg:col-span-3 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Atualizar
            </button>
        </form>
    </div>

@endsection
