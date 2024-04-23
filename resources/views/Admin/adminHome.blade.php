@extends('layouts.adminLayout')

@section('title', 'Pagina Administrativa')

@section('content')

    <h1 class="my-8 text-3xl text-center">Bem-vindo Admin</h1>

    <div id="search-container" class="container mx-auto mb-8">
        <h1 class="mb-4 text-2xl">Procurar Produto</h1>
        <form action="/admin/home" method="GET">
            <input type="text" name="search" id="search" class="w-full px-4 py-2 border border-gray-300 rounded-md"
                placeholder="Procurar">
        </form>
    </div>

    <div class="container mx-auto mb-8">
        <h1 class="mb-4 text-2xl">Os meus Produtos</h1>

        @if (count($produto) > 0)
            <table class="w-full border border-collapse border-gray-200 table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">Id do prdouto</th>
                        <th class="px-4 py-2">Nome</th>
                        <th class="px-4 py-2">Preço</th>
                        <th class="px-4 py-2">Ferramentas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produto as $prod)
                        <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                            <td class="px-4 py-2 border">{{ $loop->index + 1 }}</td>
                            <td class="px-4 py-2 border">
                                <a href="/admin/{{ $prod->id }}"
                                    class="text-blue-500 hover:underline">{{ $prod->nome }}</a>
                            </td>
                            <td class="px-4 py-2 border">{{ $prod->preco }} €</td>
                            <td class="px-4 py-2 border">
                                <a href="/admin/edit/{{ $prod->id }}" class="px-2 py-1 btn btn-info">Editar</a>
                                <form action="/admin/delete/{{ $prod->id }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center">
                <p class="mt-4">Ainda não tem nada... <a href="#" class="text-blue-500 hover:underline">crie um!</a>
                </p>
            </div>
        @endif
    </div>
@endsection
