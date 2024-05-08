@extends('layouts.main')

@section('title', 'Vinhos do Galo - vinhos')

@section('content')

    <div class="container mx-auto">
        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex items-center justify-between mb-8">
            <form action="/vinhos" method="GET" class="flex-grow mr-4">
                <div class="flex items-center py-2 border-b-2 border-red-500">
                    <input type="text" name="search" id="search"
                        class="w-full px-2 py-1 mr-3 leading-tight text-gray-700 bg-transparent border-none appearance-none focus:outline-none"
                        placeholder="Pesquisar...">
                    <button type="submit"
                        class="flex-shrink-0 px-2 py-1 text-sm text-white bg-red-500 border-4 border-red-500 rounded hover:bg-red-700 hover:border-red-700">Buscar</button>
                </div>
            </form>
            <div class="flex">
                <div class="relative inline-block">
                    <button id="filtroBtn" type="button"
                        class="inline-flex items-center px-4 py-2 font-bold text-gray-800 bg-gray-300 rounded hover:bg-gray-400">
                        Filtrar por
                        <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 12a1 1 0 0 1-.707-.293l-4-4a1 1 0 0 1 1.414-1.414L10 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414l-4 4a1 1 0 0 1-.707.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="filtroDropdown" class="absolute right-0 hidden mt-2 bg-white border rounded-md">
                        <div class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200">
                            <input type="checkbox" id="option1" name="option1" value="option1">
                            <label for="option1" class="ml-2">Arinto</label>
                        </div>
                        <div class="flex items-center px-4 py-2 text-gray-800 hover:bg-gray-200">
                            <input type="checkbox" id="option2" name="option2" value="option2">
                            <label for="option2" class="ml-2">Loureiro</label>
                        </div>
                    </div>
                </div>

                <button class="px-4 py-2 ml-4 font-bold text-white bg-gray-500 rounded hover:bg-gray-700">Ordenar</button>
            </div>
        </div>
        <h1 class="text-2xl text-[#AE1442] text-center mb-8">Vinhos</h1>
        <div id="vinhosContainer" class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
            @foreach ($produto as $prod)
            <div class="relative overflow-hidden bg-white border border-gray-200 rounded-lg shadow-md">
                <a href="{{route('vinhos.show',['id'=>$prod->id])}}">
                    <img src="{{ asset('img/products/' . $prod->imagem) }}" alt="{{ $prod->nome }}"
                        class="object-cover w-full transition duration-300 transform h-80 hover:scale-105">
                </a>
                <div class="p-3">
                    <h3 class="mb-1 text-lg font-semibold text-gray-800">{{ $prod->nome }}</h3>
                    <p class="mb-1 text-sm text-gray-600">{{ $prod->descricao }}</p>
                    <p class="mb-1 text-sm text-gray-600">{{ $prod->tipo_vinho }}</p>
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-gray-800">{{ $prod->preco }} €</span>
                        <a href="{{ route('addCarrinho', $prod->id) }}"
                            class="px-4 py-2 text-white bg-[#E0CD67] rounded-full hover:bg-[#602134] transition duration-300">
                            adicionar ao carrinho
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        
            @if (count($produto) == 0)
                <div class="flex flex-col items-center justify-center col-span-full">
                    <p class="mb-2 text-gray-600">
                        @if (isset($search))
                            Não encontramos nada por <span class="font-bold">{{ $search }}</span>...
                        @else
                            Não encontramos nada.
                        @endif
                    </p>
                    <p class="text-gray-600">
                        Que tal <a href="/vinhos" class="text-red-500 hover:underline">ver todos os vinhos</a>?
                    </p>
                </div>
            @endif
        </div>

        <script>
            document.getElementById("filtroBtn").addEventListener("click", function() {
                var dropdown = document.getElementById("filtroDropdown");
                if (dropdown.classList.contains("hidden")) {
                    dropdown.classList.remove("hidden");
                } else {
                    dropdown.classList.add("hidden");
                }
            });
        </script>

    </div>
@endsection
