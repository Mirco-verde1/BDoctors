<!DOCTYPE html>
<html>
<head>
  <title>Laravel Chart JS Example Tutorial - Pie Chart - Tutsmake.com</title>
  <!-- Latest CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>

<body>
    @include('layouts.guest\partials.navbar')
  <div class="chart-container">
    <div class="bar-chart-container" style="display: flex" >
     <div> <canvas id="bar-chart" width="700" height="400"></canvas> </div>
      <canvas id="bar1-chart" width="700" height="400"></canvas>
    </div>
    <a href="{{route('dashboard')}}"><button>Torna alla Dashboard</button></a>
  </div>

  <!-- javascript -->

   <script>
  $(function(){
      //get the bar chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var cDataM = JSON.parse(`<?php echo $chart1_data; ?>`);

      var ctx = $("#bar-chart");
      var ctx1 = $("#bar1-chart");

      var data = {
        labels: cData.label,
        datasets: [
          {
            label: cData.label,
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };

      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Recensioni ricevute nell'ultima settimana",
          fontSize: 18,
          fontColor: "#112"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#331",
            fontSize: 16
          }
        }
      };

      // DA QUA INIZIA LA TORTA!!

        var dataM = {
        labels: cDataM.label,
        datasets: [
          {
            label: cDataM.label,
            data: cDataM.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };

      //options
      var optionsM = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Messaggi ricevuti nell'ultima settimana",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };



      //create bar Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });

      var chart2 = new Chart(ctx1, {
          type: "pie",
          data: dataM,
          options: optionsM
      });


  });
</script>
</body>
</html>
