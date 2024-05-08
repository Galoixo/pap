<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Models\User;
use Illuminate\Http\Request;


class carrinhoController extends Controller
{
    public function addCarrinho($id)
    {
        $produto = Produto::findOrFail($id);
        $cart = session()->get('carrinho', []);
    
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id] = [
                "nome" => $produto->nome,
                "quantidade" => 1,
                "preco" => $produto->preco,
                "imagem" => $produto->imagem
            ];
        }
    
        session()->put('carrinho', $cart);
        return redirect()->back()->with('success', 'Produto foi adicionado ao carrinho');
    }

    public function carrinho(){
        return view('client.carrinho');
    }

    public function deleteProduct(Request $request)
    {
        if($request->id){
            $cart = session()->get('carrinho');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('carrinho', $cart);
            }
            session()->flash('success', 'Produto removido com sucesso');
        }
    }
}
