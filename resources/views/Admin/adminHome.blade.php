@extends('layouts.adminLayout')

@section('title', 'Pagina Administrativa')

@section('content')
    <div>
        <button id="toggleSidebar" onclick="toggleSidebar()" class="px-3 py-2 text-white bg-gray-800 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <div class="text-right">
        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-lg text-white bg-gray-500 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-black">Logout</button>
        </form>
    </div>

    <div class="mb-8 text-center">
        <h1 class="text-3xl font-semibold">Bem-vindo Admin</h1>
    </div>

    <div class="container mx-auto mb-8">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-2xl">Procurar Produto</h2>
            <a href="{{ route('createProduct') }}"
                class="inline-flex items-center px-4 py-2 text-white bg-green-500 rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                <span class="font-semibold"><strong> + </strong> Adicionar Produto</span>
            </a>
        </div>
        <form action="{{ route('admin.home')}}" method="GET" class="flex items-center mb-4">
            <input type="text" name="search" id="search"
                class="w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Procurar">
            <button type="submit"
                class="px-6 py-2 ml-4 text-white bg-blue-500 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <i class="icon ion-md-search"></i> Pesquisar
            </button>
        </form>
    </div>

    @if (session('msg'))
        <div class="relative px-4 py-3 text-green-700 bg-green-100 border border-green-400 rounded" role="alert">
            <strong class="font-bold">{{ session('nome') }} </strong>
            <span class="block sm:inline">{{ session('msg') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="w-6 h-6 text-green-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Fechar</title>
                    <path
                        d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.93 2.435a1 1 0 01-1.414-1.421l2.93-2.435-2.93-2.435a1 1 0 111.414-1.421L10 8.586l2.93-2.435a1 1 0 111.414 1.421l-2.93 2.435 2.93 2.435a1 1 0 010 1.421z" />
                </svg>
            </span>
        </div>
    @endif

    <div class="container mx-auto mb-8 bg-white rounded-lg shadow-md">
        <h1 class="py-4 text-2xl text-center bg-gray-200 rounded-t-lg">Os Meus Produtos</h1>

        @if (count($produto) > 0)
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-200 shadow-md">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Id do Produto
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Nome
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Quantidade em stock
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Preço
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                Ano de colheita
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($produto as $prod)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $prod->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $prod->nome }}</div>
                                </td>
                                <td class="items-center px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 itens-center">{{ $prod->qnt_stock }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $prod->preco }} €</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $prod->ano_colheita }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-left whitespace-nowrap">
                                    <a href="/admin/edit/{{ $prod->id }}"
                                        class="inline-flex items-center px-4 py-2 mr-2 text-white bg-blue-500 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M13.41 2.34a1 1 0 010 1.41L7.83 10l5.59 5.59a1 1 0 01-1.41 1.41l-6-6a1 1 0 010-1.41l6-6a1 1 0 011.41 0zM6 11a1 1 0 000 2H4a1 1 0 100-2h2a1 1 0 000 2zm10-8a1 1 0 00-1 1v2a1 1 0 102 0V4a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Editar
                                    </a>
                                    <button onclick="openConfirmationModal({{ $prod->id }})"
                                        class="inline-flex items-center px-4 py-2 text-white bg-red-500 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 20 20"
                                            fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                        <span class="font-semibold">Remover</span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="py-8 text-center">
                <p class="text-gray-500">Ainda não tem produtos... <a href="{{ route('createProduct') }}"
                        class="text-blue-500 hover:underline">Crie um agora!</a></p>
            </div>
        @endif
    </div>

    <div id="confirmationModal"
        class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-full bg-gray-900 bg-opacity-50">
        <div class="p-6 bg-white rounded-lg shadow-md">
            <div class="mb-4 text-center">
                <h2 class="text-xl font-semibold">Tem certeza que quer remover este produto?</h2>
            </div>
            <div class="flex justify-center">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Sim,
                        remover</button>
                    <button type="button" onclick="closeConfirmationModal()"
                        class="px-4 py-2 ml-4 text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

@endsection
