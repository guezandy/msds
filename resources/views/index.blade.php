<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>MSDS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        <blade media|%20(min-width%3A%20768px)%20%7B>.bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
        }

    </style>


    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dashboard.css') }}" />
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">MSDS</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Live
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                History
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Predictive Maintenance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Map view
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Vessel {{$vessel}}</h1>
                    <h5>({{$filename}})</h5>
                    <a href="{{ url('/1/1633068002') }}">Next hour</a>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="row">
                            @for($i = 0; $i < 8; $i++)
                                <div class="col-sm-12">
                                    <div class="card" style="margin-bottom: 20px; margin-top: 40px;">
                                        <div class="card-body">
                                            <h5 class="card-title">Field</h5>
                                            <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                            <p class="card-text">Test</p>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-md-10">
                        <canvas class="my-4 w-100" id="accelTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="compassTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="gyroTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="humidityTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="pressureTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="yawTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="pitchTimeseries" width="900" height="80"></canvas>
                        <canvas class="my-4 w-100" id="rollTimeseries" width="900" height="80"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


    <script>

        const accel_x_timeseries = <?php echo $accel_x_timeseries; ?>;
        const accel_y_timeseries = <?php echo $accel_y_timeseries; ?>;
        const accel_z_timeseries = <?php echo $accel_z_timeseries; ?>;
        const compass_x_timeseries = <?php echo $compass_x_timeseries; ?>;
        const compass_y_timeseries = <?php echo $compass_y_timeseries; ?>;
        const compass_z_timeseries = <?php echo $compass_z_timeseries; ?>;
        const gyro_x_timeseries = <?php echo $gyro_x_timeseries; ?>;
        const gyro_y_timeseries = <?php echo $gyro_y_timeseries; ?>;
        const gyro_z_timeseries = <?php echo $gyro_z_timeseries; ?>;
        const humidity_timeseries = <?php echo $humidity_timeseries; ?>;
        const pressure_timeseries = <?php echo $pressure_timeseries; ?>;
        const yaw_timeseries = <?php echo $yaw_timeseries; ?>;
        const pitch_timeseries = <?php echo $pitch_timeseries; ?>;
        const roll_timeseries = <?php echo $roll_timeseries; ?>;
        const temperature_timeseries = <?php echo $temperature_timeseries; ?>;
        
        const labels = [...Array(60).keys()];

        const accelChartData = {
            labels: labels,
            datasets: [{
                label: 'Accel X',
                backgroundColor: "red",
                borderColor: "red",
                data: accel_x_timeseries
            },
            {
                label: 'Accel Y',
                backgroundColor: "green",
                borderColor: "green",
                data: accel_y_timeseries
            },
            {
                label: 'Accel Z',
                backgroundColor: "blue",
                borderColor: "blue",
                data: accel_z_timeseries
            }]
        };

        const compassChartData = {
            labels: labels,
            datasets: [{
                label: 'Compass X',
                backgroundColor: "red",
                borderColor: "red",
                data: compass_x_timeseries
            },
            {
                label: 'Compass Y',
                backgroundColor: "green",
                borderColor: "green",
                data: compass_y_timeseries
            },
            {
                label: 'Compass Z',
                backgroundColor: "blue",
                borderColor: "blue",
                data: compass_z_timeseries
            }]
        };

        const gyroChartData = {
            labels: labels,
            datasets: [{
                label: 'Gyro X',
                backgroundColor: "red",
                borderColor: "red",
                data: gyro_x_timeseries
            },
            {
                label: 'Gyro Y',
                backgroundColor: "green",
                borderColor: "green",
                data: gyro_y_timeseries
            },
            {
                label: 'Gyro Z',
                backgroundColor: "blue",
                borderColor: "blue",
                data: gyro_z_timeseries
            }]
        };

        const humidityChartData = {
            labels: labels,
            datasets: [{
                label: 'Humidity',
                backgroundColor: "blue",
                data: humidity_timeseries
            }]
        };

        const pressureChartData = {
            labels: labels,
            datasets: [{
                label: 'Pressure',
                backgroundColor: "blue",
                data: pressure_timeseries
            }]
        };

        const yawChartData = {
            labels: labels,
            datasets: [{
                label: 'Yaw',
                backgroundColor: "blue",
                data: yaw_timeseries
            }]
        };

        const pitchChartData = {
            labels: labels,
            datasets: [{
                label: 'Pitch',
                backgroundColor: "blue",
                data: pitch_timeseries
            }]
        };

        const rollChartData = {
            labels: labels,
            datasets: [{
                label: 'Roll',
                backgroundColor: "blue",
                data: roll_timeseries
            }]
        };

        window.onload = function () {
                const humidityChart = document.getElementById("humidityTimeseries").getContext("2d");
                const accelChart = document.getElementById("accelTimeseries").getContext("2d");
                const gyroChart = document.getElementById("gyroTimeseries").getContext("2d");
                const compassChart = document.getElementById("compassTimeseries").getContext("2d");
                const pressureChart = document.getElementById("pressureTimeseries").getContext("2d");
                const yawChart = document.getElementById("yawTimeseries").getContext("2d");
                const pitchChart = document.getElementById("pitchTimeseries").getContext("2d");  
                const rollChart = document.getElementById("rollTimeseries").getContext("2d");
                
                window.myBar = new Chart(accelChart, {
                    type: 'line',
                    data: accelChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Accelerometer Data'
                        }
                    }
                });
                window.myBar = new Chart(compassChart, {
                    type: 'line',
                    data: compassChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Compass Data'
                        }
                    }
                });
                window.myBar = new Chart(gyroChart, {
                    type: 'line',
                    data: gyroChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Gyro Data'
                        }
                    }
                });
                window.myBar = new Chart(humidityChart, {
                    type: 'line',
                    data: humidityChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Humidity'
                        }
                    }
                });
                window.myBar = new Chart(pressureChart, {
                    type: 'line',
                    data: pressureChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Pressure'
                        }
                    }
                });
                window.myBar = new Chart(yawChart, {
                    type: 'line',
                    data: yawChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Yaw'
                        }
                    }
                });
                window.myBar = new Chart(pitchChart, {
                    type: 'line',
                    data: pitchChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Pitch'
                        }
                    }
                });
                window.myBar = new Chart(rollChart, {
                    type: 'line',
                    data: rollChartData,
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Roll'
                        }
                    }
                });
            }

    </script>


</body>

</html>
