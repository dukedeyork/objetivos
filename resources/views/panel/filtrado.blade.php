<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel consulta:') }}
        </h2>
    </x-slot>

     <div class="container">

          <a href="{{ route('panel.index') }}"><button type="button" class="btn btn-primary mt-3 mb-3">Regresar</button></a>
          
          <div class="card mt-3 mb-3">
            <div class="card-body">
              <h3>El objetivo de paquetes de venta es: {{ $objetive_sales }}, son $ {{ number_format($objetive_sales * $sumapaquetes) }}.</h3>
            </div>
          </div>

          <div class="card mt-3 mb-3">
            <div class="card-body">
              <h3>El objetivo de paquetes de cobranza es: {{ $objetive_incomes }} , son $ {{ number_format($objetive_incomes * $sumapaquetes) }}.</h3>
            </div>
          </div>

          <div class="card mt-3 mb-3">
            <div class="card-body">
              <h3>Cada paquete cuesta hoy: $ {{number_format($sumapaquetes)}}</h3>
            </div>
          </div>

          

          <h3 class="text-center">Estos son los resultados para el mes de {{$month_name}} del año {{$year}}.</h3>


          {{-- ARREGLO PARA QUE NO HAYA UNA DIVISION X 0 ARRRRREEEEGGGGLLLARRR CON UN SWITCH?????? --}}

          
          
          
          <?php
          if ($sumapaquetes < 1) {
            $sumapaquetes = 1;
          };

          if ($venta_acumulada < 1) {
            $venta_acumulada = 1;
          };

          if ($cobranza_acumulada < 1) {
            $cobranza_acumulada = 1;
          };

          if ($objetive_sales < 1) {
            $objetive_sales = 1;
          };

          if ($objetive_incomes < 1) {
            $objetive_incomes = 1;
          };

          $venta_chart = (($venta_acumulada / $sumapaquetes) / $objetive_sales)*100;
          $cobranza_chart = (($cobranza_acumulada / $sumapaquetes) / $objetive_incomes)*100;
          ?>


          {{-- INSERTO EL GRAFIC0 DE RELOJES PARA VENTAS Y COBRANZAS --}}

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Ventas', {{ $venta_chart }} ],
          ['Cobranzas', {{ $cobranza_chart }} ]
        ]);

        var options = {
          width: 500, height: 500,
          redFrom: 0, redTo: 50,          
          yellowFrom:50, yellowTo: 75,
          greenFrom:75, greenTo:100,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>

    <div class="container mt-4 mb-4" style="width: 500px;">
    <div id="chart_div"></div>
  </div>
    {{-- FIN DEL GRAFIC0 DE RELOJES PARA VENTAS Y COBRANZAS --}}

    <div class="card mt-3 mb-3">
      <div class="card-body">
        <h3>Llevas vendidos $ {{ number_format($venta_acumulada) }}.</h3>
      </div>
    </div>

    <div class="card mt-3 mb-3">
      <div class="card-body">
        <h3>Llevas cobrados $ {{ number_format($cobranza_acumulada) }}.</h3>
      </div>
    </div>


    <h3 class="text-center">Asi viene tu avance en el año {{$year}}.</h3>



          <div>
            <canvas id="myChart"></canvas>
          </div>
          
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          
          <script>
            const ctx = document.getElementById('myChart');
          
            new Chart(ctx, {
              type: 'bar',
              data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [
                    {
      label: 'Objetivo de Venta',
      data: [ 
        {{$objetive_sales_enero}}, 
        {{$objetive_sales_febrero}}, 
        {{$objetive_sales_marzo}}, 
        {{$objetive_sales_abril}}, 
        {{$objetive_sales_mayo}}, 
        {{$objetive_sales_junio}}, 
        {{$objetive_sales_julio}}, 
        {{$objetive_sales_agosto}}, 
        {{$objetive_sales_septiembre}}, 
        {{$objetive_sales_octubre}}, 
        {{$objetive_sales_noviembre}}, 
        {{$objetive_sales_diciembre}}],
      borderColor: '#000000',
      backgroundColor: '#5eb271',
    },
    {
      label: 'Venta Real del Mes',
      data: [
        {{$acumulative_sales_enero / $sumapaquetes}},
        {{$acumulative_sales_febrero / $sumapaquetes}},
        {{$acumulative_sales_marzo / $sumapaquetes}},
        {{$acumulative_sales_abril / $sumapaquetes}},
        {{$acumulative_sales_mayo / $sumapaquetes}},
        {{$acumulative_sales_junio / $sumapaquetes}},
        {{$acumulative_sales_julio / $sumapaquetes}},
        {{$acumulative_sales_agosto / $sumapaquetes}},
        {{$acumulative_sales_septiembre / $sumapaquetes}},
        {{$acumulative_sales_octubre / $sumapaquetes}},
        {{$acumulative_sales_noviembre / $sumapaquetes}},
        {{$acumulative_sales_diciembre / $sumapaquetes}}      
      
      ],
      borderColor: '#FF6384',
      backgroundColor: '#c07e1a',
    }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true
                  }
                }
              }
            });
          </script>


        {{-- FIN DEL GRAFICO DE BARRAS PARA EL AVANCE DEL AÑO --}}

        


      {{-- FIN DEL GRAFICO DE BARRAS PARA EL AVANCE DEL AÑO --}}
        

        <h3>{{$client_number}}</h3>
        <h3>{{$month}}</h3>
        <h3>{{$year}}</h3>
        <h3>{{$client_name}}</h3>
        <h3>{{$month_name}}</h3>
        <h3>{{$venta_acumulada}}</h3>
        <h3>{{$cobranza_acumulada / $objetive_sales}}</h3>



        




    </div>
    
</x-app-layout>


