@extends('layouts.master')

@section('content')
<div class="container" style="color: #000;">
       
        <h1 class="title">
            Listagem dos Patrimônios
        </h1>
        <a href="{{url('patrimonio/create')}}">
            <button class="btn btn-primary"><i class="fas fa-user-plus"></i><b> Cadastrar</b></button>
        </a>

        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Data de aquisição</th>
                <th>Descrição</th>
            </tr>

            @forelse($patrimonios as $patr)
            <tr>
                <td>{{$patr->nomePatrimonio}}</td>
                <td>{{$patr->valorPatrimonio}}</td>
                <td>{{$patr->dataPatrimonio}}</td>
                <td>{{$patr->descricaoPatrimonio}}</td>
                <td>
                <button class="btn btn-info" style="background-color: #4682B4;">
                    <a href="{{ url('patrimonio/'.$patr->id.'/edit') }}" class="edit">
                        <i class="fas fa-pencil-square-o" style="color: #fff"></i>
                    </a>
                </button>

                <button class="btn btn-danger" style="background-color: #ff0000">
                    <a href="{{ url('patrimonio/'.$patr->id.'/destroy') }}" class="delete">
                        <i class="fas fa-trash-alt" style="color: #fff"></i>
                    </a>
                </button>
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
        <h4>Total de patrimônios: {{ count($patrimonios) }}</h4>
    </div>
@endsection
