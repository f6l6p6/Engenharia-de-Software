<?php

namespace App\Http\Controllers;

use App\Project;
use App\Funcionario;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $total = 3;

    public function index(Project $cliente)
    {
        $projects = $cliente->with('funcionario')->paginate($this->total);
        /*foreach ($projects as $key => $value) {
            $teste[$key]=$value->funcionario->nomeFuncionario;
        }
        var_dump($teste);exit;*/
        //var_dump($projects[0]->funcionario->nomeFuncionario);exit;
        $types = $cliente->type();
        return view('client.index', compact('projects', 'types'));
    }

    public function show($id)
    {
        //
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        //dd($funcionarios);exit;
        return view('client.create', compact('funcionarios'));
    }

    public function store(Request $request)
    {
        Project::create( $request->all() );

        return redirect('client')->with('message', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $funcionarios = Funcionario::all();
        
        return view('client.edit', compact('project', 'funcionarios'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        
        $project->status_cliente = $_POST['status_cliente'];
        
        $project->update($request->all());

        return redirect('client')
            ->with('message', 'Cliente alterado com sucesso');
    }

    public function delete(Request $request, $id)
    {
        $client = Project::findOrFail($id);
        $client->status_cliente = 'I';
        $client->save();
        //$client->delete();

        return redirect('client')
            ->with('message', 'Cliente deletado com sucesso');
    }

    public function searchClient(Request $request, Project $teste){

        $data = $request->except('_token');
        
        $projects = $teste->where(function ($query) use ($data){
           if(isset($data['name']))
               $query->where('name', $data['name']);
            if(isset($data['status_cliente']))
                $query->where('status_cliente', $data['status_cliente']);
        })->paginate($this->total);
        //->toSql();dd($clientes);
        $types = $teste->type();
        return view('client.index', compact('projects', 'types', 'data'));
    }
}