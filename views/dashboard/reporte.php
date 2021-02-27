<?php require_once __DIR__ . '/../../config.php'; 
$title = "Reportes";
include BASE_DIR . '/includes/headerdash.php';
include BASE_DIR . '/includes/db.php';
$ID = $_COOKIE['ID'];
$Nivel = $_COOKIE['Nivel'];
?>
<div  class="content">
<div class="row" style="background-color: white; padding-top: 40px;padding-bottom: 40px;padding-left: 40px;">
<h6 style="padding-right: 24px;padding-top: 9px;">Año de reporte </h6> 
<select  name="cambio" id="cambio" style="padding-top: 10px;padding-bottom: 10px;padding-left: 10px;" onchange="activar();">
              <option value = "0">Seleccione un año...</option>
              <option value = "1" >2020</option>
              <option value = "2">2021</option>
              <option value = 3>2022</option>
              <option value = 4>2023</option>
              <option value = 5>2024</option>
              </select>
</div>
        <div class="row" style="background-color: white;">
      <div class="col-md-6" >
            <div class="">
            
            <div  id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
              
              </div>
            </div>
      </div>
      <div class="col-md-6">
            <div >
           
            <div  id="container1" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">
              </div>
            </div>
      </div>
        </div>
</div>

<script type='text/javascript'>
function activar()
   {
    var res="";
    var valor = document.getElementById('cambio');
    var valora = valor.options[valor.selectedIndex].text;
  
  if (document.getElementById('cambio').value !=0) 
  {
    $.ajax({
    type: 'POST',
    url: 'https://proyectoautomotriz20202.000webhostapp.com/src/dashboard/reporte.php',
    async:false,
    data: 'valor='+valora,
    success : function (resultado) {
                res=resultado; // asignamos el valor a la variable global
         }
        });
        Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Servicios del '+ valora
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            allowPointSelect: false,
            cursor: 'pointer',
            dataLabels: {
                enabled: true
            },
            showInLegend: false
        }
    },
    series: [{
        name: 'Servicios',
        colorByPoint: true,
        data: [{
            name: 'Completados',
            y: parseInt(res[0], 10)
        }, {
            name: 'Cancelados',
            y: parseInt(res[1], 10)
        }, {
            name: 'En proceso',
            y: parseInt(res[2], 10)
        }]
    }]
    }, function(chart) {
        var textX = chart.plotLeft + (chart.series[0].center[0]);
        var textY = chart.plotTop + (chart.series[0].center[1]);
    }); 

  Highcharts.chart('container1', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Servicios por mes del '+valora
    },
    xAxis: {
        categories: ['Dic', 'Nov', 'Oct', 'Sep', 'Ago','Jul', 'Jun', 'May', 'Abr', 'Mar','Feb', 'Ene'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Servicios',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' Servicios'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Completados',
        data: [parseInt(res[36], 10), 
        parseInt(res[33], 10),
        parseInt(res[30], 10), 
        parseInt(res[27], 10), 
        parseInt(res[24], 10),       
        parseInt(res[21], 10), 
        parseInt(res[18], 10),
        parseInt(res[15], 10), 
        parseInt(res[12], 10), 
        parseInt(res[9], 10),        
        parseInt(res[6], 10), 
        parseInt(res[3], 10)]
    }, {
        name: 'Cancelados',
        data: [parseInt(res[37], 10),
        parseInt(res[34], 10), 
        parseInt(res[31], 10), 
        parseInt(res[28], 10), 
        parseInt(res[25], 10),       
        parseInt(res[22], 10), 
        parseInt(res[19], 10),
        parseInt(res[16], 10), 
        parseInt(res[13], 10), 
        parseInt(res[10], 10),
        parseInt(res[7], 10), 
        parseInt(res[4], 10)]
    }, {
        name: 'En Proceso',
        data: [parseInt(res[38], 10), 
        parseInt(res[35], 10), 
        parseInt(res[32], 10),
        parseInt(res[29], 10), 
        parseInt(res[26], 10),       
        parseInt(res[23], 10), 
        parseInt(res[20], 10),
        parseInt(res[17], 10), 
        parseInt(res[14], 10), 
        parseInt(res[11], 10),
        parseInt(res[8], 10), 
        parseInt(res[5], 10)]
    }]
 });
}
else
{
    document.getElementById("container").innerHTML="";
    document.getElementById("container1").innerHTML="";
}

}



</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<?php include BASE_DIR . '/includes/footerdash.php'; ?>