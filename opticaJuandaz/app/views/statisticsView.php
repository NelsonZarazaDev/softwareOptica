<?php

class statisticsView
{
  function paginateStatistics($array_day, $array_secretary, $array_optometrist)
  {

    $json_secretary = json_encode($array_secretary);
    $json_optometrist = json_encode($array_optometrist);
    echo '<script>';
    echo 'var secretaryData = ' . $json_secretary . ';';
    echo 'var optometristData = ' . $json_optometrist . ';';
    echo '</script>';
 
    $countMedicalHistory = $array_day[0]['medicalhistory'];
    $countQuote = $array_day[0]['quote'];
?>
    <script>
      document.getElementById("textInfo").innerHTML = "Estadisticas";
    </script>

    <div class="card-body mt-4">
      <form id="formSearchTod" class="mb-5">
        <div class="input-group position-static justify-content-end">
          <input type="date" id="searchTod" name="searchTod" class="inputSearch p-2"">
          <span class=" input-group-text" id="">
          <button type="button" class="search" onclick="Statistics.searchTod()">
            <i class="bi bi-search"></i>
          </button>
          </span>
        </div>
      </form>


      <div class="row cols-row-2 mb-5">
        <div class="col-lg-5">
          <div class="dropdown-menu position-static col-lg-12 mb-3 d-flex flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
            <div class="col-lg-5 d-flex justify-content-center">
              <div class="statisticalCircle d-flex justify-content-center align-items-center">
                <div id="countMedicalHistory"><?php echo $countMedicalHistory ?></div>
              </div>
            </div>
            <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
            <hr class="d-lg-none">
            <div class="textStatistical col-lg-5 d-flex align-items-center justify-content-center">
              Historias Clinicas
            </div>
          </div>

          <div class="dropdown-menu position-static col-lg-12 mt-3 mb-5 d-flex flex-column flex-lg-row justify-content-start p-3 rounded-3 shadow-lg" data-bs-theme="light">
            <div class="col-lg-5 d-flex justify-content-center">
              <div class="statisticalCircle d-flex justify-content-center align-items-center">
                <div id="countQuote"><?php echo $countQuote ?></div>
              </div>
            </div>
            <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
            <hr class="d-lg-none">
            <div class="textStatistical col-lg-5 d-flex align-items-center justify-content-center">
              Reserva
            </div>
          </div>
        </div>

        <div class="card-body col-lg-7 d-flex justify-content-center align-items-center" id="chartsSection">
          <canvas id="pieChart" class="col-12"></canvas>
        </div>



      </div>





      <h3>Estadisticas Secretarias</h3>
      <hr class=" hrInfo">
      <div>
        <div class="row row-cols-1 row-cols-lg-3 g-lg-2 gap-1 gap-lg-3 justify-content-center justify-content-lg-start">
          <?php
          foreach ($array_secretary as $object_secretary) {
            $name_access = $object_secretary['name_access'];
            $document_access = $object_secretary['document_access'];
            $quantity_clinical_stories = $object_secretary['quantity_clinical_stories'];
            $reserves_quantity = $object_secretary['reserves_quantity'];
          ?>
            <div class="dropdown-menu position-static mb-2 d-flex flex-column flex-lg-row justify-content-start col-sm-12 p-3 rounded-3 shadow-lg" style="width: 33.60%;" data-bs-theme="light">
              <div class="col-lg-6 d-flex justify-content-center flex-column align-items-center">
                <img class="statisticalCircle" src="public/img/<?php echo $document_access; ?>.jpg" alt="">
                <div class="textStatistical mt-3"><?php echo $name_access; ?></div>
              </div>
              <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
              <hr class="d-lg-none">
              <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="textStatistical">Historias clinicas:<br><?php echo $quantity_clinical_stories; ?></div>
                <div class="textStatistical">Reservas:<br><?php echo $reserves_quantity; ?></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="chart mt-4 mb-5">
        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>

      <h3>Estadisticas Optometras</h3>
      <hr class="hrInfo">
      <div>
        <div class="row row-cols-1 row-cols-lg-3 g-lg-2 gap-1 gap-lg-3 justify-content-center justify-content-lg-start">
          <?php
          foreach ($array_optometrist as $object_optometrist) {
            $name_access = $object_optometrist['name_access'];
            $document_access = $object_optometrist['document_access'];
            $quantity_clinical_stories = $object_optometrist['quantity_clinical_stories'];
          ?>
            <div class="dropdown-menu position-static mb-2 d-flex flex-column flex-lg-row justify-content-start col-sm-12 p-3 rounded-3 shadow-lg" style="width: 33.60%;" data-bs-theme="light">
              <div class="col-lg-6 d-flex justify-content-center flex-column align-items-center">
                <img class="statisticalCircle" src="public/img/<?php echo $document_access; ?>.jpg" alt="">
                <div class="textStatistical mt-3"><?php echo $name_access; ?></div>
              </div>
              <div class="d-none d-lg-block vr mx-4 opacity-10">&nbsp;</div>
              <hr class="d-lg-none">
              <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="textStatistical">Historias clinicas:<br><?php echo $quantity_clinical_stories; ?></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="chart mt-4 mb-5">
        <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
      </div>

    </div>




















    <script>
      var countMedicalHistoryElement = document.getElementById('countMedicalHistory');
      var countMedicalHistory = parseInt(countMedicalHistoryElement.innerHTML, 10);
      var countQuoteElement = document.getElementById('countQuote');
      var countQuote = parseInt(countQuoteElement.innerHTML, 10);

      var dataArray = {
        nameAccess: [],
        documentAccess: [],
        quantityClinicalStories: [],
        reservesQuantity: []
      };
      var inputData = secretaryData;
      inputData.forEach(function(item) {
        dataArray.nameAccess.push(item.name_access);
        dataArray.documentAccess.push(item.document_access);
        dataArray.quantityClinicalStories.push(item.quantity_clinical_stories);
        dataArray.reservesQuantity.push(item.reserves_quantity);
      });

      var dataOptometry = {
        nameAccess: [],
        documentAccess: [],
        quantityClinicalStories: [],
      };
      var inputDataOptometry = optometristData;
      inputData.forEach(function(item) {
        dataOptometry.nameAccess.push(item.name_access);
        dataOptometry.documentAccess.push(item.document_access);
        dataOptometry.quantityClinicalStories.push(item.quantity_clinical_stories);
      });

      updatePieChartData(countMedicalHistory, countQuote, dataArray, dataOptometry);


      function updatePieChartData(countMedicalHistory, countQuote, dataArray, dataOptometry) {
        var nameAccess = dataArray.nameAccess;
        var reservesQuantity = dataArray.reservesQuantity;
        var quantityClinicalStories = dataArray.quantityClinicalStories;
        var nameAccessOptometry = dataOptometry.nameAccess;
        var quantityClinicalStoriesOptometry = dataOptometry.quantityClinicalStories;
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
            data: [countMedicalHistory, countQuote],
            backgroundColor: ['#042256', '#3b4883'],
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


        $(function() {
          var areaChartData = {
            labels: nameAccess,
            datasets: [{
                label: 'Reservas',
                backgroundColor: '#042256',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: reservesQuantity
              },
              {
                label: 'Historias clínicas',
                backgroundColor: '#3b4883',
                borderColor: 'rgba(210, 214, 222, 1)',
                pointRadius: false,
                pointColor: 'rgba(210, 214, 222, 1)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: quantityClinicalStories
              },
            ]
          };

          var barChartCanvas1 = $('#barChart').get(0).getContext('2d');
          var barChartData1 = $.extend(true, {}, areaChartData);

          var barChartOptions1 = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          };

          new Chart(barChartCanvas1, {
            type: 'bar',
            data: barChartData1,
            options: barChartOptions1
          });


          // Function for the second bar chart
          var areaGraphDataOptometrists = {
            labels: nameAccessOptometry,
            datasets: [{
              label: 'Historias clinicas',
              backgroundColor: '#3b4883',
              borderColor: 'rgba(60,141,188,0.8)',
              pointRadius: false,
              pointColor: '#3b8bba',
              pointStrokeColor: 'rgba(60,141,188,1)',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(60,141,188,1)',
              data: quantityClinicalStoriesOptometry
            }]
          };

          var barChartCanvas2 = $('#barChart2').get(0).getContext('2d');
          var barChartData2 = $.extend(true, {}, areaGraphDataOptometrists);

          var barChartOptions2 = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
          };

          new Chart(barChartCanvas2, {
            type: 'bar',
            data: barChartData2,
            options: barChartOptions2
          });
          // Call the functions to create the charts
        });
      }
    </script>




<?php
  }
}

?>