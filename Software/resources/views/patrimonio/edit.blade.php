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
            <div class="card card-primary" style="border-radius:5px;background-color:#f2f2f2;padding:40px; border: #4682B4 solid 2px;">
              <div class="card-header">
                <h3 class="card-title"><b>Editar Patrimônio</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{url('patrimonio/'.$patrimonio->id.'/update')}}" file="true"> {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nomePatrimonio">Nome</label>
                    <input type="text" class="form-control" value="{{$patrimonio->nomePatrimonio}}" name="nomePatrimonio">
                  </div>
                  <div class="form-group">
                    <label for="valorPatrimonio">Valor</label>
                    <input type="text" class="form-control" value="{{$patrimonio->valorPatrimonio}}" name="valorPatrimonio">
                  </div>
                  <div class="form-group">
                    <label for="dataPatrimonio">Data de Aquisição</label>
                    <input type="date" class="form-control" value="{{$patrimonio->dataPatrimonio}}" name="dataPatrimonio">
                  </div>
                  <div class="form-group">
                    <label for="descricaoPatrimonio">Descrição</label>
                    <input type="text" class="form-control" 
                    value="{{$patrimonio->descricaoPatrimonio}}" name="descricaoPatrimonio">
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
