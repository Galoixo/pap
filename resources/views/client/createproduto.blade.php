@extends('layouts.main')

@section('title', 'Vinhos do Galo - Adicionar Produto')

@section('content')
    <br>
    <center>
        <h1 class="text-4xl">Adicionar Produto</h1>
        <div class="w-1/2 bg-gray-400 rounded-2xl">
            <form action="/vinhos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="imagem" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-lg shadow-md cursor-pointer hover:bg-blue-600">Selecione uma imagem</label>
                    <input type="file" id="imagem" name="imagem" class="form-control-file">
                </div>
                <div class="form-group">
                    <label for="nome">Produto:</label>
                    <input type="text" class="w-64 px-4 py-2 mt-2 border-gray-300 rounded-lg shadow-md focus:border-blue-500 focus:ring focus:ring-blue-200" id="nome" name="nome" placeholder="Nome do Produto">
                </div>
                <div class="form-group">
                    <label for="tipo_vinho">Tipo de vinho:</label>
                    <select name="tipo_vinho" id="tipo_vinho" class="form-control">
                        <option value="0">Arinto</option>
                        <option value="1">Loureiro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" class="w-64 px-4 py-2 mt-2 border-gray-300 rounded-lg shadow-md focus:border-blue-500 focus:ring focus:ring-blue-200" id="preco" name="preco" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <input type="text" class="w-64 px-4 py-2 mt-2 border-gray-300 rounded-lg shadow-md focus:border-blue-500 focus:ring focus:ring-blue-200" id="descricao" name="descricao" placeholder="Descrição do produto">
                </div>
                <div class="form-group">
                    <label for="qnt_stock">Quantidade em estoque:</label>
                    <input type="text" class="w-64 px-4 py-2 mt-2 border-gray-300 rounded-lg shadow-md focus:border-blue-500 focus:ring focus:ring-blue-200" id="qnt_stock" name="qnt_stock" placeholder="Quantidade em estoque">
                </div>
                <div class="form-group">
                    <label for="ispack">Em pack:</label>
                    <select name="ispack" id="ispack" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ano_colheita">Ano de colheita:</label>
                    <input type="number" class="w-64 px-4 py-2 mt-2 border-gray-300 rounded-lg shadow-md focus:border-blue-500 focus:ring focus:ring-blue-200" id="ano_colheita" name="ano_colheita" placeholder="Ano de colheita">
                </div>
                <input type="submit" class="btn btn-primary" value="Adicionar">
            </form>
        </div>
    </center>
@endsection
