@extends('layouts.main')

@section('title', $produto->nome)

@section('content')


    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="mt-10 rounded-2xl col-md-6">
                <img src=" {{ asset('img/products/' . $produto->imagem) }}" alt=" {{ $produto->nome }}" class="rounded-xl">
            </div>
            <div class="mt-[30px]">
                <h1 class="text-3xl text-black"> {{ $produto->nome}}</h1>
                {{-- <p class="btn-holder"><a href="{{ route('addCarrinho', $produto->id)}}" class="btn btn-outlne-danger">Adicionar ao Carrinho</a></p> --}}
            </div>
        </div>
    </div>



@endsection
