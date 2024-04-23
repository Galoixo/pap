<?php

namespace App\Http\Controllers;

use App\Models\produto;
use App\Models\User;
use Illuminate\Http\Request;

class vinhosController extends Controller
{
    public function showVinhos()
    {
        $search = request('search');

        if ($search) {
            $produto = produto::where([
                ['nome', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produto = produto::all();
        }

        return view('client.vinhos', ["produto" => $produto, "search"=>$search]);
    }

    public function create()
    {
        return view('client.createproduto');
    }

    public function store(Request $request)
    {
        $produto = new Produto;
    
        $produto->nome = $request->nome;
        $produto->tipo_vinho = $request->tipo_vinho;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->qnt_stock = $request->qnt_stock;
        $produto->ispack = $request->ispack;
        $produto->ano_colheita = $request->ano_colheita;
    
        // Upload da imagem
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->file('imagem');

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $produto->imagem = $imageName;
        }
        
        // $user = auth()->user();
        // $produto->id = $user->id;

        $produto->save();
    
        return redirect('/vinhos')->with('msg', 'Vinho adicionado com sucesso!');
    }

    public function show($id) 
    {
        $produto = produto::findOrFail($id);

        return view('client.show', ['produto'=>$produto]);

    }


    // public function index() 
    // {
    //     // Consulta ao banco de dados para obter todos os produtos
    //     $produto = Produto::all();

    //     // Verifica se há produtos antes de passá-los para a view
    //     if (!is_null($produto) && count($produto) > 0) {
    //         return view('Admin.adminHome', ['produto' => $produto]);
    //     } else {
    //         // Se não houver produtos, retorna uma mensagem ou redireciona para uma página adequada
    //         return redirect()->route('dashboard')->with('error', 'Nenhum produto encontrado.');
    //     }
    // }

    // public function read()
    // {
    //     $search = request('search');

    //     if ($search) {
    //         $produto = produto::where([
    //             ['nome', 'like', '%' . $search . '%']
    //         ])->get();
    //     } else {
    //         $produto = produto::all();
    //     }
    //     return view('client.vinhos', ["produto" => $produto, 'search' => $search]);
    // }

    public function dashboard()
    {
        $produto = produto::all();

        return view('Admin.adminHome', ['produto'=>$produto]);
    }
    
    public function edit($id)
    {
        $produto = produto::findOrFail($id);

        return view('Admin.adminEdit', ['produto'=>$produto]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $requestImage = $request->file('imagem');

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/games'), $imageName);

            $data['imagem'] = $imageName;
        }

        produto::findOrFail($id)->update($data);
    
        return redirect('/admin/home')->with('msg', 'Sucesso!');
    }

    public function destroy($id)
    {
        produto::findOrFail($id)->delete();

        return redirect('/admin/home')->with('msg', 'Sucesso!');
    }
}
