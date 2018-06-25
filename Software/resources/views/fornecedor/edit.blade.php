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
             <h1><b>Edição de Fornecedor</b></h1>
           </div>
              <!-- form start -->
              <form role="form" method="POST" action="{{url('fornecedor/'.$fornecedor->id.'/update')}}" file="true"> 
                {{ csrf_field() }}
                <div class="panel-body">
                  <div class="form-group">
                    <label for="nomeFornecedor">Nome</label>
                    <input type="text" class="form-control" name="nomeFornecedor"
                    value="{{$fornecedor->nomeFornecedor}}">
                  </div>

                  <div class="form-group">
                    @if($fornecedor->status_fornecedor == 'I')
                    <input type="radio" checked name="status_fornecedor" value="{{$fornecedor->status_fornecedor}}"/>Inativo
                    <input type="radio" name="status_fornecedor" value="A"/>Ativo
                    @else
                    <input type="radio" checked name="status_fornecedor" value="A"/>Ativo
                    <input type="radio" name="status_fornecedor" value="I"/>Inativo
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input type="text" class="form-control" name="cnpj"
                    value="{{$fornecedor->cnpj}}">
                  </div>

                  <div class="form-group">
                    <label for="tel">Telefone</label>
                    <input type="text" class="form-control" name="tel" value="{{$fornecedor->tel}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$fornecedor->email}}">
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