<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Fornecedor;

class ProdutoController extends Controller
{
    private $total = 3;

    public function index(Produto $produto)
    {
        $produtos = $produto->with('fornecedores')->paginate($this->total);
        $fornecedores = Fornecedor::orderBy('nomeFornecedor')->get();
        //$teste=$produtos[1]->fornecedores[0]->nomeFornecedor;
        //dd($teste);exit;
        return view('produto.index', compact('produtos', 'fornecedores'));
    }

    public function create()
    {
        $fornecedores = Fornecedor::orderBy('nomeFornecedor')->get();
        return view('produto.create', compact('fornecedores'));
    }

    public function store(Request $request)
    {
        Produto::create($request->all())
            ->fornecedores()->attach($_POST['fornecedor_id']);

        return redirect('produto')->with('message', 'Produto cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $fornecedores = Fornecedor::all();
        
        return view('produto.edit', compact('produto', 'fornecedores'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->fornecedores()->sync($_POST['fornecedor_id']);
        $produto->update($request->all());
        //$produto->fornecedores()->attach($_POST['fornecedor_id']);

        return redirect('produto')
            ->with('message', 'Produto alterado com sucesso');
    }

    public function delete($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->fornecedores()->detach($id);
        $produto->delete();

        return redirect('produto')
            ->with('message', 'Produto deletado com sucesso');
    }

    public function searchProduto(Request $request, Produto $teste){

        $data = $request->except('_token');
        
        $produtos = $teste->where(function ($query) use ($data){
           if(isset($data['nomeProduto']))
               $query->where('nomeProduto', $data['nomeProduto']);
            if(isset($data['fornecedor_id']))
                $query->where('fornecedor_id', $data['fornecedor_id']);
        })->paginate($this->total);

        
        //->toSql();dd($clientes);
        return view('produto.index', compact('produtos', 'data'));
    }
}
