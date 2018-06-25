@extends('layouts.master')

@section('content')
<!-- Font Awesome


 -->
  
 <!-- Main content -->
    <script type="text/javascript">
      function fornecedor(){
        var $x = document.getElementById("esc").value.split("-");
        document.getElementById("teste").value = $x[1]; 
      }
    </script>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="panel panel-primary" style=" color: #000;">

           <div class="panel panel-heading">
             <h1><b>Editar</b></h1>
           </div>
              <!-- form start -->
              <form role="form" method="POST" action="{{url('agenda/'.$agenda->id.'/update')}}" file="true"> {{ csrf_field() }}
                <div class="panel-body">
                  <div class="form-group">
                    <select name="nomeCliente" id="esc" class="form-control" 
                    onclick="fornecedor();">
                      @forelse($projects as $project)
                        <option id="esc" value="{{$project->name}}-{{$project->funcionario->nomeFuncionario}}">{{$project->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nomeFuncionario">Funcionário</label>
                    <input disabled type="text" id="teste" value="" class="form-control" name="nomeFuncionario">
                  </div>

                  <div class="form-group">
                    <label for="task_date">Data do agendamento</label>
                    <input type="date" class="form-control" 
                    value="{{str_replace(' 00:00:00', '', $agenda->task_date)}}" 
                    name="task_date">
                  </div>

                  <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" value="{{$agenda->descricao}}" class="form-control">
                  </div>

                <!-- /.card-body -->

                <div class="panel-footer">
                  <button type="submit" class="btn btn-primary">Salvar</button>
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