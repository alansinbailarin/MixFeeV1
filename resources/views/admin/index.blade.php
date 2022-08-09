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

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div id="container" style="width:100%"></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div id="container2"style="width:100%"></div>
                    </div>
                </div>
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
        text: 'Cantidad de Trabajos por Categoría'
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
            name: "Browsers",
            colorByPoint: true,
            data: <?= $data ?>
        }
    ]
});


    </script>

</body>
</html>
</script>
@stop
