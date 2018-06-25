@extends('layouts.master')

@section('content')
<div class="container" style=" color: #000;">
    <div class="panel panel-primary">
    <div class="panel panel-body">

    <div class="col-md-6">
                <a href="{{url('agenda/create')}}">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i><b> Cadastrar</b>
                    </button>
                </a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('search.agenda') }}" method="POST" 
            class="form form-inline" style="margin-left: 50px;">
                {!! csrf_field() !!}

                <input type="text" name="nomeCliente" class="form-control" placeholder="Cliente">

                <input type="date" name="task_date" class="form-control">
                
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>


        <table class="table table-default">
            <tr>
                <th>Data</th>
                <th>Nome do cliente</th>
                <th>Nome do Funcionário</th>
                <th>Descrição</th>
            </tr>

            @forelse($projects as $project)
            <tr>
                <td>{{$project->task_date->format('d/m/y')}}</td>
                <td>{{$project->nomeCliente}}</td>
                <td>{{$project->nomeFuncionario}}</td>  
                <td>{{$project->descricao}}</td>
                <td>
                <a href="{{ url('agenda/'.$project->id.'/edit') }}" 
                class="edit">
                    <button class="btn btn-info" 
                    style="background-color: #4682B4;"><i class="fas fa-pencil-square-o" style="color: #fff"></i></button>
                </a>
                
                <a href="{{ url('agenda/'.$project->id.'/destroy') }}" 
                class="delete">
                    <button class="btn btn-danger" 
                    style="background-color: #ff0000">
                        <i class="fas fa-trash-alt" style="color: #fff"></i>
                    </button>
                </a>
                </td>

            </tr>
                @empty
                <tr>
                    <td colspan="90">
                        <p>Nenhum Resultado!</p>
                    </td>
                </tr>
                @endforelse
        </table>  
</div>
</div>
</div>
@endsection