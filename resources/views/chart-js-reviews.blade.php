<!DOCTYPE html>
<html>

    <head>
        <title>{{ __('BDoctors - Grafico') }}</title>
            <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>

    <body>
        <div id="app">

            <go-top bg-color="#1DB487" :bottom="50"></go-top>
            @include('layouts/guest/partials/navbar')

            <div class="margin-top-chart overflow-hidden">

                <div class="row p-4">

                    <div class="col-xl-2 col-md-12">
                        <a href="{{route('dashboard')}}"><button class="btn btn-navbar-toggler"><i class="far fa-hand-point-left"></i> <span>Torna alla Dashboard</span></button></a>
                    </div>

                    <div class="col-xl-5 col-md-6">
                        <canvas id="bar-chart" width="400" height="400"></canvas>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <canvas id="bar1-chart" width="400" height="400"></canvas>
                    </div>

                </div>

            </div>

            @include('layouts/guest/partials/footer')
        </div>

        <!-- javascript -->
        <script>
            $(function () {
                //get the bar chart canvas
                var cData = JSON.parse(`<?php echo $chart_data; ?>`);
                var cDataM = JSON.parse(`<?php echo $chart1_data; ?>`);

                var ctx = $("#bar-chart");
                var ctx1 = $("#bar1-chart");

                var data = {
                    labels: cData.label,
                    datasets: [{
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
                        borderWidth: [1, 1, 1, 1, 1, 1, 1]
                    }]
                };

                //options
                var options = {
                    responsive: false,
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
                    datasets: [{
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
                        borderWidth: [1, 1, 1, 1, 1, 1, 1]
                    }]
                };

                //options
                var optionsM = {
                    responsive: false,
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
                    type: "doughnut",
                    data: data,
                    options: options
                });

                var chart2 = new Chart(ctx1, {
                    type: "doughnut",
                    data: dataM,
                    options: optionsM
                });


            });

        </script>



    </body>

</html>
