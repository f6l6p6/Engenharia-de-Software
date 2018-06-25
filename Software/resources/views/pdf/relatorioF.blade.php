<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


  <title>Barbearia</title>
   <!-- CSRF Token -->
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Ano', 'Qtd Produto'],
          ['2018', <?php echo $meses[0]; ?>],
          ['2019', <?php echo $meses[1]; ?>],
          ['2020', <?php echo $meses[2]; ?>],
          ['2021', <?php echo $meses[3]; ?>],
          ['2022', <?php echo $meses[4]; ?>],
          ['2023', <?php echo $meses[5]; ?>],
          ['2024', <?php echo $meses[6]; ?>],
          ['2025', <?php echo $meses[7]; ?>],
          
        ]);

        var options = {
          chart: {
            title: 'Validade dos produtos',
            subtitle: 'Barbearia Bom Bigode, Período: 2018-2025',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>


</head>

<body>
<div class="container" style=" color: #000;">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-6">
            <h1>Relatório dos Produtos</h1>
        </div>

        <div class="col-md-6">
            <a href="{{ url('pdf-produto') }}">
                <button class="btn btn-dark" style="margin-left: 450px;">
                    <i class="fas fa-pencil-square-o"></i><b>Imprimir</b>
                </button>
            </a>
        </div>
    </div></br>
    <div class="row">

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Data de aquisição</th>
                <th>Validade</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Fornecedor</th>
            </thead>

            @forelse($projects as $produto)
            <tr>
                <td>{{$produto->created_at->format('d/m/y')}}</td>
                <td>{{$produto->validadeProduto->format('d/m/y')}}</td>
                <td>{{$produto->nomeProduto}}</td>
                <td>R$ {{$produto->precoProduto}}</td>
                <td>{{$produto->marcaProduto}}</td>
                <td>
                @forelse($produto->fornecedores as $produto)
                  {{$produto->nomeFornecedor}}/
                @empty
                @endforelse
                </td>
            </tr>
            @empty
            @endforelse
        </table>       
</div>

<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>