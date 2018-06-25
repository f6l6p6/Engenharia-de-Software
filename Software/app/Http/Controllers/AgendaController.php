<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Project;
use App\Produto;

class AgendaController extends Controller
{

    public function index(Agenda $cliente)
    {
        $projects = $cliente->orderBy('task_date')->get();
        return view('tasks.index', compact('projects'));
    }


    public function create(Project $cliente)
    {
        $projects = $cliente->where('status_cliente','A')->with('funcionario')->        orderBy('name')->get();
        return view('tasks.create', compact('projects'));
    }


    public function store(Request $request, Agenda $agenda)
    {
        $teste = explode('-', $request->nomeCliente);

        $agenda->create([
                        'nomeCliente'=>$teste[0],
                        'nomeFuncionario'=>$teste[1],
                        'descricao'=>$request->descricao,
                        'task_date'=>$request->task_date
                        ]);
        return redirect('agenda')->with('message', 'Corte agendado com sucesso!');
        //dd($teste[1]);
    }


    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        $projects = Project::where('status_cliente','A')->get();
        
        return view('tasks.edit', compact('agenda', 'projects'));
    }


    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $nome = explode("-", $request->nomeCliente);//nome-funcionario
        $agenda->update([
                        'nomeCliente'=>$nome[0],
                        'nomeFuncionario'=>$nome[1],
                        'descricao'=>$request->descricao,
                        'task_date'=>$request->task_date
                        ]);

        return redirect('agenda')
            ->with('message', 'Agenda alterada com sucesso');
    }


    public function delete($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();
        return redirect('agenda')
            ->with('message', 'Cancelado');
    }


    public function searchAgenda(Request $request, Agenda $teste){

        $data = $request->except('_token');

        $projects = $teste->where(function ($query) use ($data){
           if(isset($data['task_date']))
               $query->where('task_date', $data['task_date']);
           if(isset($data['nomeCliente']))
               $query->where('nomeCliente', $data['nomeCliente']);
        })->orderBy('task_date')->get();
        //->toSql();dd($clientes);
        return view('tasks.index', compact('projects', 'data'));
    }


    public function relatorio(Agenda $cliente)
    {
        $projects = $cliente->orderBy('task_date')->get();

        $janeiro = 0 ; $fevereiro = 0 ; $março = 0; 
        $abril = 0 ; $maio = 0 ; $junho = 0 ;

        for($i=0;$i<count($projects);$i++){
            if($projects[$i]->task_date->format('m') == 1)
                $janeiro++;
            if($projects[$i]->task_date->format('m') == 2)
                $fevereiro++;
            if($projects[$i]->task_date->format('m') == 3)
                $março++;
            if($projects[$i]->task_date->format('m') == 4)
                $abril++;
            if($projects[$i]->task_date->format('m') == 5)
                $maio++;
            if($projects[$i]->task_date->format('m') == 6)
                $junho++;
        }
        $meses = $janeiro."-".$fevereiro."-".$março."-".$abril."-".$maio."-".$junho;
        $meses=explode("-",$meses);
        $menor = min($meses);
        //dd($meses);
        
        return view('pdf.index', compact('projects', 'meses', 'menor'));
    }


    public function pdf(Agenda $cliente)
    {
        $projects = $cliente->orderBy('task_date')->get();

        $janeiro = 0 ; $fevereiro = 0 ; $março = 0; 
        $abril = 0 ; $maio = 0 ; $junho = 0 ;

        for($i=0;$i<count($projects);$i++){
            if($projects[$i]->task_date->format('m') == 1)
                $janeiro++;
            if($projects[$i]->task_date->format('m') == 2)
                $fevereiro++;
            if($projects[$i]->task_date->format('m') == 3)
                $março++;
            if($projects[$i]->task_date->format('m') == 4)
                $abril++;
            if($projects[$i]->task_date->format('m') == 5)
                $maio++;
            if($projects[$i]->task_date->format('m') == 6)
                $junho++;
        }
        //dd($meses);
        return \PDF::loadView('pdf.imprimir', compact('projects','fevereiro'))->setPaper('a4', 'landscape')->stream('Semestre_1.pdf');
                    //return view('pdf.index', compact('projects','fevereiro'));
    }


    public function relatorioProduto(Produto $produto)
    {
        $projects = $produto->orderBy('created_at')->with('fornecedores')->get();

        $a1 = 0 ; $a2 = 0 ; $a3 = 0; $a4 = 0;
        $a5 = 0 ; $a6 = 0 ; $a7 = 0; $a8 = 0; 

        for($i=0;$i<count($projects);$i++){
            if($projects[$i]->validadeProduto->format('y') == 18)
                $a1++;
            if($projects[$i]->validadeProduto->format('y') == 19)
                $a2++;
            if($projects[$i]->validadeProduto->format('y') == 20)
                $a3++;
            if($projects[$i]->validadeProduto->format('y') == 21)
                $a4++;
            if($projects[$i]->validadeProduto->format('y') == 22)
                $a5++;
            if($projects[$i]->validadeProduto->format('y') == 23)
                $a6++;
            if($projects[$i]->validadeProduto->format('y') == 24)
                $a7++;
            if($projects[$i]->validadeProduto->format('y') == 25)
                $a8++;
        }
        $meses = $a1."-".$a2."-".$a3."-".$a4."-".$a5."-".$a6."-".$a7."-".$a8;
        $meses=explode("-",$meses);
        
        return view('pdf.relatorioF', compact('projects', 'meses'));
    }


    public function pdfProduto(Produto $produto)
    {
        $projects = $produto->orderBy('created_at')->with('fornecedores')->get();

        $a1 = 0 ; $a2 = 0 ; $a3 = 0; $a4 = 0;
        $a5 = 0 ; $a6 = 0 ; $a7 = 0; $a8 = 0; 

        for($i=0;$i<count($projects);$i++){
            if($projects[$i]->validadeProduto->format('y') == 18)
                $a1++;
            if($projects[$i]->validadeProduto->format('y') == 19)
                $a2++;
            if($projects[$i]->validadeProduto->format('y') == 20)
                $a3++;
            if($projects[$i]->validadeProduto->format('y') == 21)
                $a4++;
            if($projects[$i]->validadeProduto->format('y') == 22)
                $a5++;
            if($projects[$i]->validadeProduto->format('y') == 23)
                $a6++;
            if($projects[$i]->validadeProduto->format('y') == 24)
                $a7++;
            if($projects[$i]->validadeProduto->format('y') == 25)
                $a8++;
        }
        $meses = $a1."-".$a2."-".$a3."-".$a4."-".$a5."-".$a6."-".$a7."-".$a8;
        $meses=explode("-",$meses);
        
        return \PDF::loadView('pdf.imprimirProduto', compact('projects','meses'))->setPaper('a4', 'landscape')->stream('Produto.pdf');
                    //return view('pdf.index', compact('projects','fevereiro'));
    }
}
