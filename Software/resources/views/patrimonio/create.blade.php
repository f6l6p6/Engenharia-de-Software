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
                <h3 class="card-title"><b>Cadastrar Patrimônio</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('patrimonio.store')}}" file="true"> {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="nomePatrimonio">Nome</label>
                    <input type="text" class="form-control" name="nomePatrimonio" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="valorPatrimonio">Valor</label>
                    <input type="number" step="0.01" min="0" class="form-control"
                    name="valorPatrimonio" placeholder="R$">
                  </div>
                  <div class="form-group">
                    <label for="dataPatrimonio">Data de Aquisição</label>
                    <input type="date" class="form-control" name="dataPatrimonio" placeholder="Nome">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="descricaoPatrimonio">Descrição</label>
                    <input type="text" class="form-control" name="descricaoPatrimonio" placeholder="">
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
