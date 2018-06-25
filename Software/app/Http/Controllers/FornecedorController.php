<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    private $total = 3;

    public function index(Fornecedor $fornecedor)
    {
        $fornecedores = $fornecedor->paginate($this->total);
        /*foreach ($projects as $key => $value) {
            $teste[$key]=$value->funcionario->nomeFuncionario;
        }
        var_dump($teste);exit;*/
        //var_dump($projects[0]->funcionario->nomeFuncionario);exit;
        $types = $fornecedor->type();
        return view('fornecedor.index', compact('fornecedores', 'types'));
    }

    public function create()
    {
        return view('fornecedor.create');
    }

    public function store(Request $request)
    {
        Fornecedor::create( $request->all() );

        return redirect('fornecedor')->with('message', 'Fornecedor cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        
        return view('fornecedor.edit', compact('fornecedor'));
    }

    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        
        $fornecedor->status_fornecedor = $_POST['status_fornecedor'];
        
        $fornecedor->update($request->all());

        return redirect('fornecedor')
            ->with('message', 'Fornecedor alterado com sucesso');
    }

    public function delete($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->status_fornecedor = 'I';
        $fornecedor->save();

        return redirect('fornecedor')
            ->with('message', 'Fornecedor deletado com sucesso');
    }

    public function searchFornecedor(Request $request, Fornecedor $teste){

        $data = $request->except('_token');
        
        $fornecedores = $teste->where(function ($query) use ($data){
           if(isset($data['nomeFornecedor']))
               $query->where('nomeFornecedor', $data['nomeFornecedor']);
            if(isset($data['status_fornecedor']))
                $query->where('status_fornecedor', $data['status_fornecedor']);
        })->paginate($this->total);
        //->toSql();dd($clientes);
        $types = $teste->type();
        return view('fornecedor.index', compact('fornecedores', 'types', 'data'));
    }
}
