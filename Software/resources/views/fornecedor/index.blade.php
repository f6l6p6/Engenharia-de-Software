@extends('layouts.master')

@section('content')
<div class="container" style=" color: #000;">
       <div class="panel panel-primary">
        <div class="panel panel-heading">
        <h1 class="title">
            <b>Listagem dos fornecedores</b>
        </h1>
        </div>
        <div class="panel panel-body">
            <div class="col-md-6">
                <a href="{{url('fornecedor/create')}}">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i><b> Cadastrar</b>
                    </button>
                </a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('search.fornecedor') }}" method="POST" 
            class="form form-inline">
                {!! csrf_field() !!}
                <input type="text" name="nomefornecedor" class="form-control" placeholder="Nome">
                <select name="status_fornecedor" class="form-control">
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
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Status</th>
                <th>E-mail</th>
            </tr>

            @forelse($fornecedores as $fornecedor)
            <tr>
                <td>{{$fornecedor->nomeFornecedor}}</td>
                <td>{{$fornecedor->cnpj}}</td>
                <td>{{$fornecedor->tel}}</td>
                <td>{{$fornecedor->type($fornecedor->status_fornecedor)}}</td>
                <td>{{$fornecedor->email}}</td>
                <td>
                
                <a href="{{ url('fornecedor/'.$fornecedor->id.'/edit') }}" 
                class="edit">
                    <button class="btn btn-info" 
                    style="background-color: #4682B4;"><i class="fas fa-pencil-square-o" style="color: #fff"></button>
                    </i>
                </a>
                
                <a href="{{ url('fornecedor/'.$fornecedor->id.'/destroy') }}" 
                class="delete">
                    <button class="btn btn-danger" 
                    style="background-color: #ff0000">
                        <i class="fas fa-trash-alt" style="color: #fff">
                    </button>
                </i>
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
        <!--<h4>Total de clientes: {{ count($fornecedores) }}</h4>-->
        @if(isset($data))
            {!! $fornecedores->appends($data)->links() !!}
        @else
            {!! $fornecedores->links() !!}
        @endif
    </div>
    </div>
    </div>
@endsection