@extends('layouts.master')

@section('content')
<div class="container" style=" color: #000;">
       <div class="panel panel-primary">
        <div class="panel panel-heading">
        <h1 class="title">
            <b>Listagem dos clientes</b>
        </h1>
        </div>
        <div class="panel panel-body">
            <div class="col-md-6">
                <a href="{{url('client/create')}}">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i><b> Cadastrar</b>
                    </button>
                </a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('search.client') }}" method="POST" 
            class="form form-inline">
                {!! csrf_field() !!}
                <input type="text" name="name" class="form-control" placeholder="Nome">
                <select name="status_cliente" class="form-control">
                    <option value="">--Selecione o Tipo--</option>
                    @foreach($types as $key => $type)
                        <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
                
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>


        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Data de Nascimento</th>
                <th>Status</th>
                <th>Funcionário</th>
            </tr>

            @forelse($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->email}}</td>
                <td>{{$project->tel}}</td>  
                <td>{{$project->data_nasc->format('d/m/Y')}}</td>
                <td>{{$project->type($project->status_cliente)}}</td>
                <td>{{$project->funcionario->nomeFuncionario}}</td>
                <td>
                
                <a href="{{ url('client/'.$project->id.'/edit') }}" 
                class="edit">
                    <button class="btn btn-info" 
                    style="background-color: #4682B4;"><i class="fas fa-pencil-square-o" style="color: #fff"></i></button>
                    
                </a>
                
                <a href="{{ url('client/'.$project->id.'/destroy') }}" 
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
        <!--<h4>Total de clientes: {{ count($projects) }}</h4>-->
        @if(isset($data))
            {!! $projects->appends($data)->links() !!}
        @else
            {!! $projects->links() !!}
        @endif
    </div>
    </div>
    </div>
@endsection