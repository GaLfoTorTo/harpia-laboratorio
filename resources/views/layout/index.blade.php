@include('layout.header')
@include('layout.navbar')
@include('layout.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $data['procedimentos'] }}</h3>

                <p>Procedimentos</p>
              </div>
              <div class="icon">
                <i class="fas fa-check-double"></i>
              </div>
              <a href="/procedimento" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $data['servicos'] }}</h3>

                <p>Serviços</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/servicos" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $data['colaboradores'] }}</h3>

                <p>Colaboradores</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/colaboradores" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $data['equipamentos'] }}</h3>

                <p>Equipamentos</p>
              </div>
              <div class="icon">
                <i class="fas fa-vial"></i>
              </div>
              <a href="/equipamentos" class="small-box-footer">Visualizar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>


        <div class="row">
          <div class="col">
            <div id="grafico-container"></div>
          </div>
        </div>






        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@include('layout.footer')
@php
  $meses_array = [];
  $valores_array = [];

foreach ($data['analises_criticas'] as $key => $value ){
    $meses_array[] = ucfirst($value->mes);
    $valores_array[] = $value->total;
}
$meses = "'".implode("','", $meses_array)."'";
$valores = implode(",", $valores_array);
@endphp
<script>

  Highcharts.chart('grafico-container', {

title: {
    text: 'Análises Críticas por mês em {{ date('Y') }}'
},
credits: false,

// subtitle: {
//     text: 'Teste'
// },
xAxis: {
        categories: [{!! $meses !!}],
},
yAxis: {
    title: {
        text: 'Número de análises críticas'
    },
},

legend: {
    layout: 'horizontal',
    align: 'center',
    verticalAlign: 'bottom'
},

plotOptions: {

},

series: [{
    name: 'Total',
    data: [ {!! $valores !!}]
 }, 
//{
//     name: 'Manufacturing',
//     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
// }, {
//     name: 'Sales & Distribution',
//     data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
// }, {
//     name: 'Project Development',
//     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
// }, {
//     name: 'Other',
//     data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
// }
],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
  </script>
  