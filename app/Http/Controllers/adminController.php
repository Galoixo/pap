<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produto;

class adminController extends Controller
{
    public function create()
    {
        return view('client.createproduto');
    }

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
        $produto = produto::findOrFail($id);
    
        if ($request->hasFile('nova_imagem') && $request->file('nova_imagem')->isValid()) {
    
            $requestImage = $request->file('nova_imagem');
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
    
            $requestImage->move(public_path('img/games'), $imageName);
    
            $data['imagem'] = $imageName;
        }
    
        produto::findOrFail($id)->update($data);
    
        return redirect('/admin/home')->with(['msg' => 'Atualização bem-sucedida', 'nome' => $produto->nome]);
    }

    public function destroy($id)
    {
        produto::findOrFail($id)->delete();

        return redirect('/admin/home')->with('msg', 'Sucesso!');
    }

    public function search()
    {
        $search = request('search');

        if ($search) {
            $produto = produto::where([
                ['nome', 'like', '%' . $search . '%']
            ])->get();
        } else {
            $produto = produto::all();
        }   

        return view('Admin.adminHome', ['produto'=>$produto]);
    }

    public function validateAnoColheita(Request $request, $id)
    {
        try {
            $produto = produto::findOrFail($id);
            
            $request->validate([
                'ano_colheita' => 'required|numeric|lte:2024'
            ]);

            $produto->ano_colheita = $request->input('ano_colheita');

            $produto->save();

            return redirect()->back()->with('success', 'Atualizado com sucesso!');

        } catch (\Error $e) {
            echo "<strong>Erro na linha: " . $e->getLine() . "<br> no arquivo " . $e->getFile() . " ... <br> </strong>";
        }        
    }

}
