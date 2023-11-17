<?php

class statisticsView
{
  function paginateStatistics()
  {
?>
    <script>
      document.getElementById("textInfo").innerHTML = "Estadisticas";
    </script>
    <div class="card-body mt-4">
      <div class="row cols-row-2 mb-5">
        <div class="col-lg-5">
          <div class="dropdown-menu position-static col-lg-12 mb-3 d-flex flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
            <div class="col-lg-5 d-flex justify-content-center">
              <div class="statisticalCircle d-flex justify-content-center align-items-center">15</div>
            </div>
            <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
            <hr class="d-lg-none">
            <div class="textStatistical col-lg-5 d-flex align-items-center justify-content-center">
              Historias Clinicas
            </div>
          </div>

          <div class="dropdown-menu position-static col-lg-12 mt-3 mb-5 d-flex flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
            <div class="col-lg-5 d-flex justify-content-center">
              <div class="statisticalCircle d-flex justify-content-center align-items-center">10</div>
            </div>
            <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
            <hr class="d-lg-none">
            <div class="textStatistical col-lg-5 d-flex align-items-center justify-content-center">
              Reserva
            </div>
          </div>

        </div>
        <div class="card-body col-lg-7 d-flex justify-content-center align-items-center">
          <canvas id="pieChart" class="col-12"></canvas>
        </div>
      </div>







      <h3>Estadisticas Secretarias</h3>
      <hr class=" hrInfo mb-5">
            <div>
              <div class="row row-cols-1 row-cols-sm-2 g-2 gap-lg-3">
                <div class="dropdown-menu position-static mb-2 d-flex col-lg flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
                  <div class="col-lg-5 d-flex justify-content-center">
                    <div class="statisticalCircle"></div>
                  </div>
                  <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
                  <hr class="d-lg-none">
                  <div class="d-flex align-items-center flex-column justify-content-center">
                    <div class="textStatistical">Historias clinicas: 50</div>
                    <div class="textStatistical">Reservas:<br>20</div>                  </div>
                </div>

                <div class="dropdown-menu position-static mb-2  d-flex col-lg flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
                  <div class="col-lg-5 d-flex justify-content-center">
                    <div class="statisticalCircle"></div>
                  </div>
                  <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
                  <hr class="d-lg-none">
                  <div class="d-flex align-items-center flex-column justify-content-center">
                    <div class="textStatistical">Historias clinicas: 50</div>
                    <div class="textStatistical">Reservas:<br>20</div>
                  </div>
                </div>

                <div class="dropdown-menu position-static mb-2 d-flex col-lg flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
                  <div class="col-lg-5 d-flex justify-content-center">
                    <div class="statisticalCircle"></div>
                  </div>
                  <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
                  <hr class="d-lg-none">
                  <div class="d-flex align-items-center flex-column justify-content-center">
                    <div class="textStatistical">Historias clinicas: 50</div>
                    <div class="textStatistical">Reservas:<br>20</div>                  </div>
                </div>
              </div>


            </div>
            <div class="chart mt-4 mb-5">
              <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
        </div>



        <h3>Estadisticas Optometras</h3>
        <hr class="hrInfo mb-5">
        <div>
          <div class="row row-cols-1 row-cols-sm-2 g-2 gap-lg-3">
            <div class="dropdown-menu position-static mb-2 d-flex col-lg flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
              <div class="col-lg-5 d-flex justify-content-center">
                <div class="statisticalCircle"></div>
              </div>
              <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
              <hr class="d-lg-none">
              <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="textStatistical">Historias clinicas: 50</div>
              </div>
            </div>

            <div class="dropdown-menu position-static mb-2  d-flex col-lg flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
              <div class="col-lg-5 d-flex justify-content-center">
                <div class="statisticalCircle"></div>
              </div>
              <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
              <hr class="d-lg-none">
              <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="textStatistical">Historias clinicas: 50</div>
              </div>
            </div>

            <div class="dropdown-menu position-static mb-2 d-flex col-lg flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
              <div class="col-lg-5 d-flex justify-content-center">
                <div class="statisticalCircle"></div>
              </div>
              <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
              <hr class="d-lg-none">
              <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="textStatistical">Historias clinicas: 50</div>
              </div>
            </div>
          </div>


        </div>
        <div class="chart mt-4 mb-5">
          <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
      </div>















      <script>
        $(function() {
          //--------------
          //- AREA CHART -
          //--------------

          var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Digital Goods',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [28, 48, 40, 19, 86, 27, 90]
              },
              {
                label: 'Electronics',
                backgroundColor: 'rgba(210, 214, 222, 1)',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: [65, 59, 80, 81, 56, 55, 100]
              },
            ]
          }

          //-------------
          //- PIE CHART -
          //-------------

          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieData = {
            labels: [
              'Reservas',
              'Historias Clinicas',
            ],
            datasets: [{
              data: [300, 100],
              backgroundColor: ['#3c8dbc', '#d2d6de'],
            }]
          }
          var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
          }
          new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          //-------------
          //- BAR CHART -
          //-------------

          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var barChartData = $.extend(true, {}, areaChartData)
          var temp0 = areaChartData.datasets[0]
          var temp1 = areaChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })


          var barChartCanvas = $('#barChart2').get(0).getContext('2d')
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
          })
        })
      </script>
    </div>
<?php
  }
}
