@extends('layouts.master')

@section('content')
<!-- Font Awesome


 -->
  
 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="panel panel-primary" style=" color: #000;">

           <div class="panel panel-heading">
             <h1><b>Cadastro de Fornecedores</b></h1>
           </div>
              <!-- form start -->
              <form role="form" method="POST" action="{{route('fornecedor.store')}}" file="true"> {{ csrf_field() }}
                <div class="panel-body">
                  <div class="form-group">
                    <label for="nomeFornecedor">Nome</label>
                    <input type="text" class="form-control" name="nomeFornecedor" placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">
                  </div>
                  <div class="form-group">
                    <label for="tel">Telefone</label>
                    <input type="text" class="form-control" name="tel" placeholder="Telefone">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                    <input type="hidden" class="form-control" name="status_fornecedor" value="A">
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