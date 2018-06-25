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
             <h1><b>Edição de Produto</b></h1>
           </div>
              <!-- form start -->
              <form role="form" method="POST" action="{{url('produto/'.$produto->id.'/update')}}" file="true"> 
                {{ csrf_field() }}
                <div class="panel-body">
                  <div class="form-group">
                    <label for="nomeProduto">Nome</label>
                    <input type="text" class="form-control" name="nomeProduto"
                    value="{{$produto->nomeProduto}}">
                  </div>
                  
                  <div class="form-group">
                    <label for="precoProduto">Preço</label>
                    <input type="number" class="form-control" name="precoProduto"
                    value="{{$produto->precoProduto}}">
                  </div>

                  <div class="form-group">
                    <label for="marcaProduto">Marca</label>
                      <select class="form-control" name="marcaProduto">
                          <option value="Embelezze">Embelezze</option>
                          <option value="Seda">Seda</option>
                          <option value="Natura">Natura</option>
                      </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="fornecedor_id">Fornecedor</label>
                      <select class="form-control" name="fornecedor_id">
                        @forelse($fornecedores as $fornecedor)
                          <option value="{{$fornecedor->id}}">
                            {{$fornecedor->nomeFornecedor}}
                          </option>
                        @empty
                        @endforelse
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="obsProduto">Observação</label>
                    <input type="text" class="form-control" name="obsProduto"
                    value="{{$produto->obsProduto}}">
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