<?php
    $labels = array();
    $dht22_temperature = array();
    $dht22_humidity = array();
    $bmp388_temperature = array();
    $bmp388_pressure = array();
    $bmp388_altitude = array();
?>
<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.js" integrity="sha512-opXrgVcTHsEVdBUZqTPlW9S8+99hNbaHmXtAdXXc61OUU6gOII5ku/PzZFqexHXc3hnK8IrJKHo+T7O4GRIJcw==" crossorigin="anonymous"></script>

        <title>piLaSense</title>
    </head>

    <body class="font-sans antialiased">
        <div class="bg-gray-100 h-full overflow-x-hidden">
            <div class="flex justify-center items-center w-screen h-20 border-b-2 bg-white shadow-sm">
                <div class="w-full max-w-screen-xl flex justify-end items-center">
                    <div class="mx-4 text-xl">
                        @auth
                            <a href="{{route('admin')}}" class="px-2">Admin</a>
                        @else
                            <a href="{{route('login')}}" class="px-2">Log in</a>

                            <a href="{{route('register')}}" class="px-2">Register</a>
                        @endauth
                    </div>
                </div>
            </div>

            <div class="p-4">
                <h1 class="flex justify-center w-100 text-6xl py-4">piLaSense</h1>

                <div class="w-full max-w-screen-xl m-auto">
                    @forelse (App\Models\sensor_system::all() as $sensor_system)
                        @forelse ($sensor_system->recent_sensor_datas(120) as $recent_sensor_data)
                            <?php
                                array_push($labels, $recent_sensor_data->created_at->format('h:i:s A'));
                                array_push($dht22_temperature, $recent_sensor_data->dht22_temperature);
                                array_push($dht22_humidity, $recent_sensor_data->dht22_humidity);
                                array_push($bmp388_temperature, $recent_sensor_data->bmp388_temperature);
                                array_push($bmp388_pressure, $recent_sensor_data->bmp388_pressure);
                                array_push($bmp388_altitude, $recent_sensor_data->bmp388_altitude);
                            ?>
                        @empty
                            <div class="w-full text-xl flex justify-center">
                                <p>No sensors data found!</p>
                            </div>

                        @endforelse

                    <h2 class="text-5xl">{{ucfirst($sensor_system->name)}}</h2>

                    <div class="py-4">
                        <h2 class="text-4xl">Temperature (°C)</h2>
                        <canvas class="" id="index_temperature_chart" height="100"></canvas>
                    </div>

                    <div class="py-4">
                        <h2 class="text-4xl">Humidity (%)</h2>
                        <canvas class="" id="index_humidity_chart" height="100"></canvas>
                    </div>

                    <div class="py-4">
                        <h2 class="text-4xl">Pressure (Hectopascals)</h2>
                        <canvas class="" id="index_pressure_chart" height="100"></canvas>
                    </div>

                    <div class="py-4">
                        <h2 class="text-4xl">Altitude (Meters)</h2>
                        <canvas class="" id="index_altitude_chart" height="100"></canvas>
                    </div>

                    @empty
                        <div class="w-full text-xl bg-white rounded shadow-sm flex justify-center">
                            <p>No sensors found!</p>
                        </div>

                    @endforelse

                    <form action="" method="GET">

                    </form>
                </div>
            </div>
        <div>

        <?php
            $labels = array_reverse($labels);
            $dht22_temperature = array_reverse($dht22_temperature);
            $dht22_humidity = array_reverse($dht22_humidity);
            $bmp388_temperature = array_reverse($bmp388_temperature);
            $bmp388_pressure = array_reverse($bmp388_pressure);
            $sbmp388_altitude = array_reverse($bmp388_altitude);
        ?>

        <script>
            var idc = document.getElementById('index_temperature_chart').getContext('2d');
            var index_temperature_chart = new Chart(idc, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($labels as $label) {
                                echo '\'' .  strval($label) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'DHT22 Temperature',
                        data: [
                            <?php
                                foreach($dht22_temperature as $temperature) {
                                    echo '\'' .  strval($temperature) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524',
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 1
                    }, {
                        label: 'BMP388 Temperature',
                        data: [
                            <?php
                                foreach($bmp388_temperature as $temperature) {
                                    echo '\'' .  strval($temperature) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#78290f',
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 1
                    }
                    ]
                },
            });

            var ihc = document.getElementById('index_humidity_chart').getContext('2d');
            var index_humidity_chart = new Chart(ihc, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($labels as $label) {
                                echo '\'' .  strval($label) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'DHT22 Humidity',
                        data: [
                            <?php
                                foreach($dht22_humidity as $humidity) {
                                    echo '\'' .  strval($humidity) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524',
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 1
                    }]
                }
            });

            var ipc = document.getElementById('index_pressure_chart').getContext('2d');
            var index_pressure_chart = new Chart(ipc, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($labels as $label) {
                                echo '\'' .  strval($label) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'DHT22 Pressure',
                        data: [
                            <?php
                                foreach($bmp388_pressure as $pressure) {
                                    echo '\'' .  strval($pressure) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524',
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 1
                    }]
                }
            });

            var iac = document.getElementById('index_altitude_chart').getContext('2d');
            var index_altitude_chart = new Chart(iac, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($labels as $label) {
                                echo '\'' .  strval($label) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'BMP388 Altitude',
                        data: [
                            <?php
                                foreach($bmp388_altitude as $altitude) {
                                    echo '\'' .  strval($altitude) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524',
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 1
                    }]
                }
            });
        </script>
    </body>

</html>
