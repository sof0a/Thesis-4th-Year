<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/analytics.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script defer src="{{ asset('js/bootstrap.bundle.js') }}"></script>

    <title>Analytics</title>

</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100 d-flex main-container">
            <!-- Sidebar -->
            {{-- @include('layouts.sidebar') <!-- Include sidebar layout --> --}}
            @include('layouts.sidebar', ['activeLink' => 'analytics'])

            <!-- Content -->
            <div class="col-9 content">
                <h1>Analytics</h1>
                <!-- graphs -->
                <div class="container d-flex ">
                    <div class="row w-100">
                        <div class="col-8">
                            <div class="chart me-3">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>Passengers</h2>
                                    <h2>Daily</h2>
                                </div>
                                {{-- <canvas id="barChart"></canvas> --}}
                                @include('analytics.passengers_per_day', ['passengersPerDay' => $passengersPerDay])
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="chart lineChartContainer">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>Frequent Places</h2>
                                    <h2></h2>
                                </div>
                                {{-- <canvas id="lineChart"></canvas> --}}
                                @include('analytics.frequent_pickup_point', ['frequentPickupPoints' => $frequentPickupPoints])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container d-flex mt-2">
                    <div class="row w-100">
                        <div class="col-4">
                            <div class="chart me-3">
                                <h2 class="mb-4">Earnings</h2>
                                <table class="table table-hover custom-table">
                                    <thead>
                                        <tr>
                                            <th class="th1">Driver Name</th>
                                            <th class="th2">Earning</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($earningsPerDriver as $earning)
                                        <tr>
                                            <td>{{ $earning->DriverName }}</td>
                                            <td>{{ $earning->TotalEarnings }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="chart lineChartContainer">
                                <div class="container d-flex justify-content-between header" style="width: auto">
                                    <h2>TODA Profit</h2>
                                    <h2>Daily</h2>
                                </div>
                                {{-- <canvas id="barChart2"></canvas> --}}
                                {{-- @include('analytics.frequent_pickup_point', ['frequentPickupPoints' => $frequentPickupPoints]) --}}
                                @include('analytics.toda_profit_per_day', ['dailyProfit' => $dailyProfit])
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('js/status.js ') }}"></script>
    <script src="{{ asset('../node_modules/chart.js/dist/chart.umd.js')}}"></script>
    <script src="{{ asset('js/chart1.js ')}}"></script>
    <script src="{{ asset('js/lineGraph.js ')}} "></script>
</body>
</html>
