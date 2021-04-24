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
  <div class="chart-container">
    <div class="bar-chart-container">
      <canvas id="bar-chart" width="600"></canvas>
      <canvas id="bar1-chart"></canvas>
    </div>
  </div>

  <!-- javascript -->

   <script>
  $(function(){
      //get the bar chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var cDataM = JSON.parse(`<?php echo $chart1_data; ?>`);
      var ctx = $("#bar-chart");
      var ctx1 = $("#bar1-chart");
      /* console.log(cDataM); */
      //bar chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Recensioni",
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
        responsive: false,
        title: {
          display: false,
          position: "top",
          text: "Last Week Registered Users -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: false,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };

      // DA QUA INIZIA LA TORTA!!

        var dataM = {
        labels: cDataM.label,
        datasets: [
          {
            label: "Recensioni",
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
        responsive: false,
        title: {
          display: false,
          position: "top",
          text: "Last Week Registered Users -  Day Wise Count",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: false,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };

      //create bar Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
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
