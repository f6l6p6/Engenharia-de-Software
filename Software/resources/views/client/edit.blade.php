@extends('layouts.master')

@section('content')
<!-- Font Awesome -->
  
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="panel panel-primary" style=" color: #000;">

           <div class="panel panel-heading">
             <h1><b>Edição de Cliente</b></h1>
           </div>
              <!-- form start -->
              <form role="form" method="POST" action="{{url('client/'.$project->id.'/update')}}" file="true"> 
                {{ csrf_field() }}
                <div class="panel-body">
                  <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name"
                    value="{{$project->name}}" placeholder="Nome">
                  </div>

                  <div class="form-group">
                    @if($project->status_cliente == 'I')
                    <input type="radio" checked name="status_cliente" value="{{$project->status_cliente}}"/>Inativo
                    <input type="radio" name="status_cliente" value="A"/>Ativo
                    @else
                    <input type="radio" checked name="status_cliente" value="A"/>Ativo
                    <input type="radio" name="status_cliente" value="I"/>Inativo
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="data_nasc">Data de Nascimento</label>
                    <input type="date" class="form-control" name="data_nasc" value="{{str_replace(' 00:00:00', '', $project->data_nasc)}}">
                  </div>
                  <div class="form-group">
                    <label for="tel">Telefone</label>
                    <input type="text" class="form-control" name="tel" value="{{$project->tel}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$project->email}}">
                  </div>

                  <div class="form-group">
                    <label for="funcionario_id">Funcionário</label>
                      <select class="form-control" name="funcionario_id">
                        @forelse($funcionarios as $funcionario)
                          <option value="{{$funcionario->id}}">
                            {{$funcionario->nomeFuncionario}}
                          </option>
                        @empty
                        @endforelse
                      </select>
                  </div>
                  
                <!-- /.card-body -->

                <div class="panel-footer">
                  <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            

                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

@endsection