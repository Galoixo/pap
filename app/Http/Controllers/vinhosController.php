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

    // public function create()
    // {
    //     return view('client.createproduto');
    // }

    public function store(Request $request)
    
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'tipo_vinho' => 'required|string|max:255',
                'preco' => 'required|numeric',
                'descricao' => 'required|string',
                'qnt_stock' => 'required|integer|min:0',
                'ispack' => 'required|boolean',
                'ano_colheita' => 'required|nullable|integer|min:1900|max:' . date('Y'),
                'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $produto = new Produto;

            $produto->nome = $request->nome;
            $produto->tipo_vinho = $request->tipo_vinho;
            $produto->preco = $request->preco;
            $produto->descricao = $request->descricao;
            $produto->qnt_stock = $request->qnt_stock;
            $produto->ispack = $request->ispack;
            $produto->ano_colheita = $request->ano_colheita;

            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                $requestImage = $request->file('imagem');
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . '_' . time()) . '.' . $extension;
                $requestImage->move(public_path('img/products'), $imageName);
                $produto->imagem = $imageName;
            }

            $produto->save();

            return redirect()->route('admin.home')->with('msg', 'Vinho adicionado com sucesso!');
        } catch (\Exception $e) {
            echo "<strong> erro no ficheiro </strong>" . $e->getFile() . "<strong> <br> na linha </strong>" . $e->getLine();
        }
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


    public function filter(Request $request)
    {
        $tipo_vinho = $request->input('tipo_vinho', []);
    
        // Lógica de filtragem com base nas opções selecionadas
        $query = Produto::query();
        if (!empty($tipo_vinho)) {
            $query->whereIn('tipo_vinho', $tipo_vinho);
        }
        $produto = $query->get();
    
        return view('client.vinhos', compact('produto'));
    }


    
    


}

