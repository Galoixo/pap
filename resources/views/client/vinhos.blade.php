@extends('layouts.main')

@section('title', 'Vinhos do Galo - vinhos')

@section('content')

    <div class="">
        <h1 class="col-start-auto text-4xl">O que procura?</h1>
        <form action="/vinhos" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <h1 class="flex flex-col items-center justify-center text-2xl text-[#AE1442]">Vinhos</h1>
    <div class="p-4 m-3">
        @if (isset($search))
            @if ($search)
                <h2 class="text-3xl ">Resultados de: {{ $search }}</h2>
            @else
                <h2>Os:</h2>
            @endif
        @endif
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-5">
            @foreach ($produto as $prod)
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <img src="{{ asset('img/products/' . $prod->imagem) }}" alt="{{ $prod->nome }}" class="object-cover w-full h-48 bg-center">
                    <div class="p-3">
                        <h3 class="mb-1 text-lg font-semibold text-gray-800">{{ $prod->nome }}</h3>
                        <span class="content-center font-semibold text-gray-800">{{ $prod->preco }} €</span>
                        <p class="text-sm text-gray-600">{{ $prod->descricao }}</p>
                        <div class="flex items-center justify-between mt-3">
                            <button class="px-3 py-1 text-white bg-[#E0CD67] rounded hover:bg-[#602134]"><a href="/vinhos/ {{ $prod->id }}">Ver</a></button>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($produto) == 0 && isset($search))
                <p>Não encontramos nada por {{ $search }} ... <a href="/vinhos">ver todos</a></p>
            @elseif (count($produto) == 0)
                <p>Não encontramos nada</p>
            @endif
        </div>
    </div>
@endsection
