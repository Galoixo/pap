@extends('layouts.main')

@section('title', 'Carrinho de Compras')

@section('content')
<div class="container px-4 py-8 mx-auto">
    <h2 class="mb-6 text-3xl font-semibold">Seu Carrinho de Compras</h2>
    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="text-sm leading-normal text-gray-700 uppercase bg-gray-200">
                    <th class="px-6 py-3 text-left">Produto</th>
                    <th class="px-6 py-3 text-left">Preço</th>
                    <th class="px-6 py-3 text-left">Quantidade</th>
                    <th class="px-6 py-3 text-left">Total</th>
                    <th class="px-6 py-3 text-left">Remover</th>
                </tr>
            </thead>
            <tbody>
                @if (session('carrinho'))
                    @foreach (session('carrinho') as $id => $details)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="mr-4">
                                        <img src="{{ asset('img/products/' . $details['imagem']) }}" alt="{{ $details['nome'] }}" class="object-cover w-12 h-12 rounded">
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold">{{ $details['nome'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $details['preco']}} €</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <button class="text-gray-600 focus:outline-none" onclick="changeQuantity('{{ $id }}', -1)">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <span id="quantity_{{ $id }}" class="mx-2">{{ $details['quantidade'] }}</span>
                                    <button class="text-gray-600 focus:outline-none" onclick="changeQuantity('{{ $id }}', 1)">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td id="total_{{ $id }}" class="px-6 py-4">{{ number_format($details['preco'] * $details['quantidade'], 2) }} €</td>
                            <td class="px-6 py-4">
                                <button class="text-red-500 hover:text-red-700 focus:outline-none" onclick="removeItem('{{ $id }}')">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    function removeItem(id) {
        // Implemente aqui a lógica para remover o item do carrinho com o ID fornecido
        console.log("Removendo item com ID: " + id);
    }

    // function changeQuantity(id, change) {
    //     // Atualiza a quantidade do item e o preço total
    //     var quantityElement = document.getElementById('quantity_' + id);
    //     var currentQuantity = parseInt(quantityElement.textContent);
    //     var newQuantity = currentQuantity + change;

    //     if (newQuantity < 1) return; // Não permitir quantidade negativa

    //     quantityElement.textContent = newQuantity;

    //     // Atualiza o preço total
    //     var totalElement = document.getElementById('total_' + id);
    //     var price = parseFloat('{{ $details["preco"] }}'); // Correção aqui
    //     var newTotal = price * newQuantity;
    //     totalElement.textContent = newTotal.toFixed(2) + ' €';
    // }
</script>

@endsection
