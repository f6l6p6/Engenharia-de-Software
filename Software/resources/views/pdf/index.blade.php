<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Janeiro',     <?php echo $meses[0];?>],
          ['Fevereiro', <?php echo $meses[1];?>],
          ['Março',      <?php echo $meses[2];?>],
          ['Abril',  <?php echo $meses[3];?>],
          ['Maio', <?php echo $meses[4];?>],
          ['Junho',    <?php echo $meses[5];?>]
        ]);

        var options = {
          title: 'Agendamentos por mês'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  <title>Barbearia</title>
   <!-- CSRF Token -->
  




</head>

<body>
<div class="container" style=" color: #000;">
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-6">
            <h1><strong>Relatório 1º Semestre 2018</strong></h1>
        </div>

        <div class="col-md-6">
            <a href="{{ url('pdf') }}">
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
                <th>Data</th>
                <th>Cliente</th>
                <th>Funcionário</th>
                <th>Descrição</th>
            </tr>
            </thead>

            @forelse($projects as $project)
            <tr>
                <td>{{$project->task_date->format('d/m/y')}}</td>
                <td>{{$project->nomeCliente}}</td>
                <td>{{$project->nomeFuncionario}}</td>  
                <td>{{$project->descricao}}</td>
            </tr>
            @empty
            <tr>
                <td colspan="90">
                    <p>Nenhum Resultado!</p>
                </td>
            </tr>
            @endforelse
        </table>       
</div>

<div id="piechart" style="width: 900px; height: 500px;"></div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>