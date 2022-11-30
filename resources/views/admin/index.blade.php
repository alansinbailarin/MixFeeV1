@extends('adminlte::page')

@section('title', 'Mixfee')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')  

<section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
    <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Usuarios registrados</span>
     <span class="info-box-number">{{$userCounted}}</span>
    </div>
    
    </div>
    
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
    <span class="info-box-icon bg-success"><i class="fas fa-briefcase"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Total trabajos</span>
    <span class="info-box-number">{{$allCounter}}</span>
    </div>
    
    </div>
    
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
    <span class="info-box-icon bg-secondary"><i class="fas fa-box"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Total categorias</span>
    <span class="info-box-number">{{$categoryCounted}}</span>
    </div>
    
    </div>
    
    </div>
    
    <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box">
    <span class="info-box-icon bg-danger"><i class="fas fa-bookmark"></i></span>
    <div class="info-box-content">
    <span class="info-box-text">Total tags</span>
    <span class="info-box-number">{{$tagCounted}}</span>
    </div>
    
    </div>
    
    </div>
    
    </div>
</section>    
<div class="card text-center">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                          </svg> Salario Mas Alto
                    </th>
                    <th>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10.5 1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4H1.5a.5.5 0 0 1 0-1H10V1.5a.5.5 0 0 1 .5-.5ZM12 3.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Zm-6.5 2A.5.5 0 0 1 6 6v1.5h8.5a.5.5 0 0 1 0 1H6V10a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5ZM1 8a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2A.5.5 0 0 1 1 8Zm9.5 2a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V13H1.5a.5.5 0 0 1 0-1H10v-1.5a.5.5 0 0 1 .5-.5Zm1.5 2.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5Z"/>
                          </svg> Salario Promedio
                    </th>
                    <th>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                          </svg> Salario Mas Bajo
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wage as $w)
                <tr>
                    <td>
                        {{$w->higherSalary}}
                    </td>
                    <td>
                        {{$w->averageSalary }}
                    </td>
                    <td>
                        {{$w->lowestSalary }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
</div>
<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
            <div id="container" style="width:100%"></div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
            <div id="container2"style="width:100%"></div>
        </div>
      </div>
    </div>
  </div>
        <div class="card" >
            <div class="card-header font-weight-bold">Promedio del salario de trabajos por Categoría</div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Nombre de Categoría
                                </th>
                                <th>
                                    Promedio
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoriesProm as $categoryProm)
                            <tr>
                                <td>
                                    {{$categoryProm->name}}
                                </td>
                                <td>
                                    {{$categoryProm->Salario_Categoria}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>
    </div>
  </div>


    <div class="card">
        <div class="card-header font-weight-bold">Ultimos usuarios registrados</div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Foto
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Empleo actual
                            </th>
                            <th>
                                Correo electrónico
                            </th>
                            <th>
                                Se registró
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestUser as $latest)
                        <tr>
                            <td >
                                <img  alt="{{$latest->name}}" src="{{$latest->profile_photo_url}}" class="w-12 h-12 object-cover rounded-full img-circle" >
                            </td>
                            <td>
                                {{$latest->name}}
                            </td>
                            <td>
                                {{$latest->current_job}}
                            </td>
                            <td>
                                {{$latest->email}}
                            </td>
                            <td>
                                {{$latest->created_at->format('Y-m-d')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
    </div>

  </div>

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!--highcharts-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
    Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Top tags mas usados'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: <?= $data?>
    }]
});
    // Create the chart
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Cantidad de Trabajos por categoria'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Trabajos'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            colorByPoint: true,
            data: <?= $data2 ?>
        }
    ]
});


    </script>

</body>
</html>
</script>
@stop
