@extends('layouts.master')

@section('content')
<div class="container" style=" color: #000;">
       <div class="panel panel-primary">
        <div class="panel panel-heading">
        <h1 class="title">
            <b>Listagem dos produtos</b>
        </h1>
        </div>
        <div class="panel panel-body">
            <div class="col-md-6">
                <a href="{{url('produto/create')}}">
                    <button class="btn btn-primary">
                        <i class="fas fa-plus"></i><b> Cadastrar</b>
                    </button>
                </a>
        </div>

        <div class="col-md-6">
            <form action="{{ route('search.produto') }}" method="POST" 
            class="form form-inline">
                {!! csrf_field() !!}
                <input type="text" name="nomeProduto" class="form-control" 
                placeholder="Produto">
                <select name="" class="form-control">
                    @forelse($fornecedores as $fornecedor)
                        <option value="{{$fornecedor->id}}">                          {{$fornecedor->nomeFornecedor}}
                        </option>
                        @empty
                        <option>-</option>
                        @endforelse
                </select>
                <!--<input type="text" name="nomeFornecedor" class="form-control" placeholder="Fornecedor">-->
                
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>


        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Validade</th>
                <th>Observação</th>
                <th>Fornecedor</th>
            </tr>

            @forelse($produtos as $produto)
            <tr>
                <td>{{$produto->nomeProduto}}</td>
                <td>R$ {{$produto->precoProduto}}</td>
                <td>{{$produto->marcaProduto}}</td>  
                <td>{{$produto->validadeProduto->format('d/m/Y')}}</td>
                <td>{{$produto->obsProduto}}</td>
                <td>
                    @forelse($produto->fornecedores as $fornecedor)
                        {{$fornecedor->nomeFornecedor}}-
                    @empty
                    <td>--</td>
                    @endforelse
                </td>
                <td>
                
                <a href="{{ url('produto/'.$produto->id.'/edit') }}" 
                class="edit">
                    <button class="btn btn-info" 
                    style="background-color: #4682B4;"><i class="fas fa-pencil-square-o" style="color: #fff"></button>
                    </i>
                </a>
                
                <a href="{{ url('produto/'.$produto->id.'/destroy') }}" 
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
        <!--<h4>Total de clientes: {{ count($produtos) }}</h4>-->
        @if(isset($data))
            {!! $produtos->appends($data)->links() !!}
        @else
            {!! $produtos->links() !!}
        @endif
    </div>
    </div>
    </div>
@endsection